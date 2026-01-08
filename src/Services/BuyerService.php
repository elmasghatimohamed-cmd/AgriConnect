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

    public function buyProduct(int $buyerId, int $productId): array
    {
        // Check if product exists and is available
        $product = $this->getProductById($productId);
        if (!$product) {
            return [
                'success' => false,
                'message' => 'Product not found'
            ];
        }

        if ($product['status'] !== 'available') {
            return [
                'success' => false,
                'message' => 'Product is not available'
            ];
        }

        // Check if buyer already purchased this product
        if ($this->hasPurchased($buyerId, $productId)) {
            return [
                'success' => false,
                'message' => 'You have already purchased this product'
            ];
        }

        // Prevent seller from buying their own product
        if ($product['seller_id'] == $buyerId) {
            return [
                'success' => false,
                'message' => 'Cannot purchase your own product'
            ];
        }

        try {
            $stmt = $this->db->prepare(
                "INSERT INTO purchases (buyer_id, product_id, purchase_date) 
                 VALUES (?, ?, NOW())"
            );

            $result = $stmt->execute([$buyerId, $productId]);

            if ($result) {
                return [
                    'success' => true,
                    'message' => 'Product purchased successfully'
                ];
            }

            return [
                'success' => false,
                'message' => 'Purchase failed'
            ];
        } catch (\PDOException $e) {
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

    public function rateSeller(int $buyerId, int $sellerId, int $rating): array
    {
        // Validate rating range
        if ($rating < 1 || $rating > 5) {
            return [
                'success' => false,
                'message' => 'Rating must be between 1 and 5'
            ];
        }

        // Check if seller exists
        if (!$this->sellerExists($sellerId)) {
            return [
                'success' => false,
                'message' => 'Seller not found'
            ];
        }

        // Prevent rating yourself
        if ($buyerId == $sellerId) {
            return [
                'success' => false,
                'message' => 'Cannot rate yourself'
            ];
        }

        // Check if buyer has already rated this seller
        if ($this->hasRated($buyerId, $sellerId)) {
            return [
                'success' => false,
                'message' => 'You have already rated this seller'
            ];
        }

        try {
            $stmt = $this->db->prepare(
                "INSERT INTO ratings (buyer_id, seller_id, rating, rating_date) 
                 VALUES (?, ?, ?, NOW())"
            );

            $result = $stmt->execute([$buyerId, $sellerId, $rating]);

            if ($result) {
                return [
                    'success' => true,
                    'message' => 'Seller rated successfully'
                ];
            }

            return [
                'success' => false,
                'message' => 'Rating failed'
            ];
        } catch (\PDOException $e) {
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
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

    public function rentLand(int $buyerId, int $landId, string $startDate, string $endDate): array
    {
        // Check if land exists
        $land = $this->getProductById($landId);
        if (!$land || $land['type'] !== 'land') {
            return [
                'success' => false,
                'message' => 'Land not found'
            ];
        }

        if ($land['status'] !== 'available') {
            return [
                'success' => false,
                'message' => 'Land is not available for rent'
            ];
        }

        // Validate dates
        $start = strtotime($startDate);
        $end = strtotime($endDate);
        $today = strtotime(date('Y-m-d'));

        if ($start === false || $end === false) {
            return [
                'success' => false,
                'message' => 'Invalid date format'
            ];
        }

        if ($start < $today) {
            return [
                'success' => false,
                'message' => 'Start date cannot be in the past'
            ];
        }

        if ($end <= $start) {
            return [
                'success' => false,
                'message' => 'End date must be after start date'
            ];
        }

        // Check if land is already rented for this period
        if ($this->isLandRented($landId, $startDate, $endDate)) {
            return [
                'success' => false,
                'message' => 'Land is already rented for this period'
            ];
        }

        try {
            $stmt = $this->db->prepare(
                "INSERT INTO land_rentals (land_id, buyer_id, start_date, end_date, status) 
                 VALUES (?, ?, ?, ?, 'active')"
            );

            $result = $stmt->execute([$landId, $buyerId, $startDate, $endDate]);

            if ($result) {
                return [
                    'success' => true,
                    'message' => 'Land rented successfully'
                ];
            }

            return [
                'success' => false,
                'message' => 'Rental failed'
            ];
        } catch (\PDOException $e) {
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

    // Helper methods
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

    private function hasPurchased(int $buyerId, int $productId): bool
    {
        try {
            $stmt = $this->db->prepare(
                "SELECT id FROM purchases WHERE buyer_id = ? AND product_id = ?"
            );
            $stmt->execute([$buyerId, $productId]);
            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (\PDOException $e) {
            return false;
        }
    }

    private function sellerExists(int $sellerId): bool
    {
        try {
            $stmt = $this->db->prepare("SELECT id FROM users WHERE id = ? AND profile = 'seller'");
            $stmt->execute([$sellerId]);
            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (\PDOException $e) {
            return false;
        }
    }

    private function hasRated(int $buyerId, int $sellerId): bool
    {
        try {
            $stmt = $this->db->prepare(
                "SELECT id FROM ratings WHERE buyer_id = ? AND seller_id = ?"
            );
            $stmt->execute([$buyerId, $sellerId]);
            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (\PDOException $e) {
            return false;
        }
    }

    private function isLandRented(int $landId, string $startDate, string $endDate): bool
    {
        try {
            $stmt = $this->db->prepare(
                "SELECT id FROM land_rentals 
                 WHERE land_id = ? 
                 AND status = 'active'
                 AND (
                     (start_date <= ? AND end_date >= ?) OR
                     (start_date <= ? AND end_date >= ?) OR
                     (start_date >= ? AND end_date <= ?)
                 )"
            );
            $stmt->execute([
                $landId,
                $startDate, $startDate,
                $endDate, $endDate,
                $startDate, $endDate
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
