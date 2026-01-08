<?php

namespace App\Services;

use PDO;

class SellerService
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function createProduct(int $sellerId, array $productData): array
    {
        // Validate product data
        $validation = $this->validateProductData($productData);
        if (!$validation['success']) {
            return $validation;
        }

        try {
            $type = $productData['type'];

            // Begin transaction
            $this->db->beginTransaction();

            // Insert into products table
            $stmt = $this->db->prepare(
                "INSERT INTO products (title, description, price, seller_id, type, status) 
                 VALUES (?, ?, ?, ?, ?, 'available')"
            );

            $result = $stmt->execute([
                $productData['title'],
                $productData['description'],
                $productData['price'],
                $sellerId,
                $type
            ]);

            if (!$result) {
                $this->db->rollBack();
                return [
                    'success' => false,
                    'message' => 'Failed to create product'
                ];
            }

            $productId = $this->db->lastInsertId();

            // Insert type-specific data
            if ($type === 'crop') {
                $validation = $this->validateCropData($productData);
                if (!$validation['success']) {
                    $this->db->rollBack();
                    return $validation;
                }

                $stmt = $this->db->prepare(
                    "INSERT INTO crops (product_id, cultivation_date, quality) 
                     VALUES (?, ?, ?)"
                );
                $result = $stmt->execute([
                    $productId,
                    $productData['cultivation_date'],
                    $productData['quality']
                ]);
            } elseif ($type === 'land') {
                $validation = $this->validateLandData($productData);
                if (!$validation['success']) {
                    $this->db->rollBack();
                    return $validation;
                }

                $stmt = $this->db->prepare(
                    "INSERT INTO lands (product_id, size, location, weather, quality) 
                     VALUES (?, ?, ?, ?, ?)"
                );
                $result = $stmt->execute([
                    $productId,
                    $productData['size'],
                    $productData['location'],
                    $productData['weather'],
                    $productData['quality']
                ]);
            } else {
                $this->db->rollBack();
                return [
                    'success' => false,
                    'message' => 'Invalid product type'
                ];
            }

            if ($result) {
                $this->db->commit();
                return [
                    'success' => true,
                    'message' => 'Product created successfully',
                    'product_id' => $productId
                ];
            } else {
                $this->db->rollBack();
                return [
                    'success' => false,
                    'message' => 'Failed to create product details'
                ];
            }
        } catch (\PDOException $e) {
            $this->db->rollBack();
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

    public function updateProduct(int $productId, int $sellerId, array $productData): array
    {
        // Verify ownership
        if (!$this->verifyProductOwnership($productId, $sellerId)) {
            return [
                'success' => false,
                'message' => 'You do not have permission to update this product'
            ];
        }

        // Check if product exists
        $product = $this->getProductById($productId);
        if (!$product) {
            return [
                'success' => false,
                'message' => 'Product not found'
            ];
        }

        try {
            $this->db->beginTransaction();

            // Update base product
            $fields = [];
            $values = [];

            foreach (['title', 'description', 'price', 'status'] as $field) {
                if (isset($productData[$field])) {
                    // Validate price
                    if ($field === 'price' && $productData[$field] <= 0) {
                        $this->db->rollBack();
                        return [
                            'success' => false,
                            'message' => 'Price must be greater than 0'
                        ];
                    }
                    $fields[] = "$field = ?";
                    $values[] = $productData[$field];
                }
            }

            if (!empty($fields)) {
                $values[] = $productId;
                $sql = "UPDATE products SET " . implode(', ', $fields) . " WHERE id = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute($values);
            }

            // Update type-specific data
            if ($product['type'] === 'crop' && isset($productData['cultivation_date'])) {
                $stmt = $this->db->prepare(
                    "UPDATE crops SET cultivation_date = ?, quality = ? WHERE product_id = ?"
                );
                $stmt->execute([
                    $productData['cultivation_date'],
                    $productData['quality'] ?? $product['quality'],
                    $productId
                ]);
            } elseif ($product['type'] === 'land') {
                $fields = [];
                $values = [];

                foreach (['size', 'location', 'weather', 'quality'] as $field) {
                    if (isset($productData[$field])) {
                        // Validate size
                        if ($field === 'size' && $productData[$field] <= 0) {
                            $this->db->rollBack();
                            return [
                                'success' => false,
                                'message' => 'Size must be greater than 0'
                            ];
                        }
                        $fields[] = "$field = ?";
                        $values[] = $productData[$field];
                    }
                }

                if (!empty($fields)) {
                    $values[] = $productId;
                    $sql = "UPDATE lands SET " . implode(', ', $fields) . " WHERE product_id = ?";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute($values);
                }
            }

            $this->db->commit();
            return [
                'success' => true,
                'message' => 'Product updated successfully'
            ];
        } catch (\PDOException $e) {
            $this->db->rollBack();
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

    public function deleteProduct(int $productId, int $sellerId): array
    {
        // Verify ownership
        if (!$this->verifyProductOwnership($productId, $sellerId)) {
            return [
                'success' => false,
                'message' => 'You do not have permission to delete this product'
            ];
        }

        // Check if product has active purchases or rentals
        if ($this->hasActivePurchases($productId)) {
            return [
                'success' => false,
                'message' => 'Cannot delete product with active purchases'
            ];
        }

        try {
            $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
            $result = $stmt->execute([$productId]);

            if ($result) {
                return [
                    'success' => true,
                    'message' => 'Product deleted successfully'
                ];
            }

            return [
                'success' => false,
                'message' => 'Failed to delete product'
            ];
        } catch (\PDOException $e) {
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

    public function getSellerProducts(int $sellerId): array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM products WHERE seller_id = ?");
            $stmt->execute([$sellerId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function getSellerRating(int $sellerId): float
    {
        try {
            $stmt = $this->db->prepare(
                "SELECT AVG(rating) as avg_rating FROM ratings WHERE seller_id = ?"
            );
            $stmt->execute([$sellerId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result && $result['avg_rating'] 
                ? (float) $result['avg_rating'] 
                : 0.0;
        } catch (\PDOException $e) {
            return 0.0;
        }
    }

    public function getSellerRatings(int $sellerId): array
    {
        try {
            $stmt = $this->db->prepare(
                "SELECT r.*, u.nom as buyer_name 
                 FROM ratings r 
                 INNER JOIN users u ON r.buyer_id = u.id 
                 WHERE r.seller_id = ? 
                 ORDER BY r.rating_date DESC"
            );
            $stmt->execute([$sellerId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }

    // Validation helper methods
    private function validateProductData(array $data): array
    {
        $requiredFields = ['title', 'description', 'price', 'type'];
        
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                return [
                    'success' => false,
                    'message' => ucfirst($field) . ' is required'
                ];
            }
        }

        if (!is_numeric($data['price']) || $data['price'] <= 0) {
            return [
                'success' => false,
                'message' => 'Price must be a positive number'
            ];
        }

        if (!in_array($data['type'], ['crop', 'land'])) {
            return [
                'success' => false,
                'message' => 'Product type must be either crop or land'
            ];
        }

        return ['success' => true];
    }

    private function validateCropData(array $data): array
    {
        if (!isset($data['cultivation_date']) || empty($data['cultivation_date'])) {
            return [
                'success' => false,
                'message' => 'Cultivation date is required for crops'
            ];
        }

        if (!isset($data['quality']) || empty($data['quality'])) {
            return [
                'success' => false,
                'message' => 'Quality is required for crops'
            ];
        }

        // Validate date format
        if (strtotime($data['cultivation_date']) === false) {
            return [
                'success' => false,
                'message' => 'Invalid cultivation date format'
            ];
        }

        return ['success' => true];
    }

    private function validateLandData(array $data): array
    {
        $requiredFields = ['size', 'location', 'weather', 'quality'];
        
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                return [
                    'success' => false,
                    'message' => ucfirst($field) . ' is required for land'
                ];
            }
        }

        if (!is_numeric($data['size']) || $data['size'] <= 0) {
            return [
                'success' => false,
                'message' => 'Size must be a positive number'
            ];
        }

        return ['success' => true];
    }

    // Helper methods
    private function verifyProductOwnership(int $productId, int $sellerId): bool
    {
        try {
            $stmt = $this->db->prepare("SELECT seller_id FROM products WHERE id = ?");
            $stmt->execute([$productId]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            return $product && $product['seller_id'] == $sellerId;
        } catch (\PDOException $e) {
            return false;
        }
    }

    private function getProductById(int $productId): ?array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->execute([$productId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ?: null;
        } catch (\PDOException $e) {
            return null;
        }
    }

    private function hasActivePurchases(int $productId): bool
    {
        try {
            $stmt = $this->db->prepare("SELECT id FROM purchases WHERE product_id = ?");
            $stmt->execute([$productId]);
            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
