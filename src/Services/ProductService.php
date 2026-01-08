<?php

namespace App\Services;

use PDO;

class ProductService
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllProducts(): array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM products WHERE status = 'available'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function getProductById(int $id): ?array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ?: null;
        } catch (\PDOException $e) {
            return null;
        }
    }

    public function getCropById(int $id): ?array
    {
        try {
            // Get product data
            $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ? AND type = 'crop'");
            $stmt->execute([$id]);
            $productData = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$productData) {
                return null;
            }

            // Get crop-specific data
            $stmt = $this->db->prepare("SELECT * FROM crops WHERE product_id = ?");
            $stmt->execute([$id]);
            $cropData = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$cropData) {
                return null;
            }

            // Merge product and crop data
            return array_merge($productData, $cropData);
        } catch (\PDOException $e) {
            return null;
        }
    }

    public function getLandById(int $id): ?array
    {
        try {
            // Get product data
            $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ? AND type = 'land'");
            $stmt->execute([$id]);
            $productData = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$productData) {
                return null;
            }

            // Get land-specific data
            $stmt = $this->db->prepare("SELECT * FROM lands WHERE product_id = ?");
            $stmt->execute([$id]);
            $landData = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$landData) {
                return null;
            }

            // Return merged data as array
            return array_merge($productData, $landData);
        } catch (\PDOException $e) {
            return null;
        }
    }

    public function getAllCrops(): array
    {
        try {
            $stmt = $this->db->prepare(
                "SELECT p.*, c.cultivation_date, c.quality 
                 FROM products p 
                 INNER JOIN crops c ON p.id = c.product_id 
                 WHERE p.type = 'crop' AND p.status = 'available'"
            );
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function getAllLands(): array
    {
        try {
            $stmt = $this->db->prepare(
                "SELECT p.*, l.size, l.location, l.weather, l.quality 
                 FROM products p 
                 INNER JOIN lands l ON p.id = l.product_id 
                 WHERE p.type = 'land' AND p.status = 'available'"
            );
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function getProductsByType(string $type): array
    {
        try {
            $stmt = $this->db->prepare(
                "SELECT * FROM products WHERE type = ? AND status = 'available'"
            );
            $stmt->execute([$type]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function searchProducts(string $query, ?string $type = null, ?float $minPrice = null, ?float $maxPrice = null): array
    {
        try {
            $sql = "SELECT * FROM products WHERE status = 'available' AND (title LIKE ? OR description LIKE ?)";
            $params = ["%$query%", "%$query%"];

            if ($type) {
                $sql .= " AND type = ?";
                $params[] = $type;
            }

            if ($minPrice !== null) {
                $sql .= " AND price >= ?";
                $params[] = $minPrice;
            }

            if ($maxPrice !== null) {
                $sql .= " AND price <= ?";
                $params[] = $maxPrice;
            }

            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function deleteProduct(int $id): bool
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function updateProductStatus(int $id, string $status): bool
    {
        try {
            $stmt = $this->db->prepare("UPDATE products SET status = ? WHERE id = ?");
            return $stmt->execute([$status, $id]);
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getProductsBySeller(int $sellerId): array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM products WHERE seller_id = ?");
            $stmt->execute([$sellerId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }
}

