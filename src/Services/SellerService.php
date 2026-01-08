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

    public function createProduct(int $sellerId, array $productData): bool
    {
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
                return false;
            }

            $productId = $this->db->lastInsertId();

            // Insert type-specific data
            if ($type === 'crop') {
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
            }

            if ($result) {
                $this->db->commit();
                return true;
            } else {
                $this->db->rollBack();
                return false;
            }
        } catch (\PDOException $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function updateProduct(int $productId, int $sellerId, array $productData): bool
    {
        try {
            // Verify ownership
            if (!$this->verifyProductOwnership($productId, $sellerId)) {
                return false;
            }

            $this->db->beginTransaction();

            // Update base product
            $fields = [];
            $values = [];

            foreach (['title', 'description', 'price', 'status'] as $field) {
                if (isset($productData[$field])) {
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
            $product = $this->getProductType($productId);

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
            return true;
        } catch (\PDOException $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function deleteProduct(int $productId, int $sellerId): bool
    {
        try {
            // Verify ownership
            if (!$this->verifyProductOwnership($productId, $sellerId)) {
                return false;
            }

            $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
            return $stmt->execute([$productId]);
        } catch (\PDOException $e) {
            return false;
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

    private function getProductType(int $productId): ?array
    {
        try {
            $stmt = $this->db->prepare("SELECT type FROM products WHERE id = ?");
            $stmt->execute([$productId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return null;
        }
    }
}
