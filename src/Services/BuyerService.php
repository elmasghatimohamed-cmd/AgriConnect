<?php

namespace App\Services;

use PDO;

class BuyerService
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function buyProduct(int $buyerId, int $productId): bool
    {
        try {
            $stmt = $this->db->prepare(
                "INSERT INTO purchases (buyer_id, product_id, purchase_date) 
                 VALUES (?, ?, NOW())"
            );

            return $stmt->execute([$buyerId, $productId]);
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function rateSeller(int $buyerId, int $sellerId, int $rating): bool
    {
        try {
            // Validate rating
            if ($rating < 1 || $rating > 5) {
                return false;
            }

            $stmt = $this->db->prepare(
                "INSERT INTO ratings (buyer_id, seller_id, rating, rating_date) 
                 VALUES (?, ?, ?, NOW())"
            );

            return $stmt->execute([$buyerId, $sellerId, $rating]);
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getAvailableProducts(): array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM products WHERE status = 'available'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function getPurchaseHistory(int $buyerId): array
    {
        try {
            $stmt = $this->db->prepare(
                "SELECT p.*, pur.purchase_date 
                 FROM purchases pur 
                 INNER JOIN products p ON pur.product_id = p.id 
                 WHERE pur.buyer_id = ? 
                 ORDER BY pur.purchase_date DESC"
            );
            $stmt->execute([$buyerId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function searchProducts(string $query, ?string $type = null): array
    {
        try {
            $sql = "SELECT * FROM products WHERE status = 'available' AND (title LIKE ? OR description LIKE ?)";
            $params = ["%$query%", "%$query%"];

            if ($type) {
                $sql .= " AND type = ?";
                $params[] = $type;
            }

            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function rentLand(int $buyerId, int $landId, string $startDate, string $endDate): bool
    {
        try {
            $stmt = $this->db->prepare(
                "INSERT INTO land_rentals (land_id, buyer_id, start_date, end_date, status) 
                 VALUES (?, ?, ?, ?, 'active')"
            );

            return $stmt->execute([$landId, $buyerId, $startDate, $endDate]);
        } catch (\PDOException $e) {
            return false;
        }
    }
}
