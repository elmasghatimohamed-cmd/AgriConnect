<?php

namespace App\Services;

use App\Models\Buyer;
use App\Models\Seller;
use PDO;

class AuthService
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function register(array $userData): array
    {
        // Validate required fields
        $validation = $this->validateRegistrationData($userData);
        if (!$validation['success']) {
            return $validation;
        }

        // Check if email already exists
        if ($this->emailExists($userData['email']) || $this->userExists($userData['id'] ?? 0)) {
            return [
                'success' => false,
                'message' => 'Email already registered'
            ];
        }

        try {
            // Create user based on profile type
            $user = $userData['profile'] === 'buyer' 
                ? new Buyer($this->db) 
                : new Seller($this->db);

            $user->setNom($userData['nom']);
            $user->setEmail($userData['email']);
            $user->setPassword($userData['password']);
            $user->setPhoneNumber($userData['phone_number']);
            $user->setCity($userData['city']);

            // Set profile-specific fields
            if ($userData['profile'] === 'buyer') {
                $user->setCompanyName($userData['company_name']);
                $user->setActivityType($userData['activity_type']);
                $user->setSiretNumber($userData['siret_number']);
                $user->setMonthlyPurchaseVolume($userData['monthly_purchase_volume']);
                $user->setDeliveryAddress($userData['delivery_address']);
            } else {
                $user->setFarmType($userData['farm_type']);
                $user->setFarmAddress($userData['farm_address']);
                $user->setMonthlyProductionCapacity($userData['monthly_production_capacity']);
                $user->setCertifications($userData['certifications'] ?? null);
            }

            // Insert into database
            $stmt = $this->db->prepare(
                "INSERT INTO users (nom, email, password, profile, phone_number, city, 
                 company_name, activity_type, siret_number, monthly_purchase_volume, delivery_address,
                 farm_type, farm_address, monthly_production_capacity, certifications) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
            );

            $result = $stmt->execute([
                $user->getNom(),
                $user->getEmail(),
                $user->getPassword(),
                $user->getProfile(),
                $user->getPhoneNumber(),
                $user->getCity(),
                // Buyer fields
                $userData['profile'] === 'buyer' ? $user->getCompanyName() : null,
                $userData['profile'] === 'buyer' ? $user->getActivityType() : null,
                $userData['profile'] === 'buyer' ? $user->getSiretNumber() : null,
                $userData['profile'] === 'buyer' ? $user->getMonthlyPurchaseVolume() : null,
                $userData['profile'] === 'buyer' ? $user->getDeliveryAddress() : null,
                // Seller fields
                $userData['profile'] === 'seller' ? $user->getFarmType() : null,
                $userData['profile'] === 'seller' ? $user->getFarmAddress() : null,
                $userData['profile'] === 'seller' ? $user->getMonthlyProductionCapacity() : null,
                $userData['profile'] === 'seller' ? $user->getCertifications() : null,
            ]);

            if ($result) {
                return [
                    'success' => true,
                    'message' => 'User registered successfully',
                    'user_id' => $this->db->lastInsertId()
                ];
            }

            return [
                'success' => false,
                'message' => 'Registration failed'
            ];
        } catch (\PDOException $e) {
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

    public function login(string $email, string $password): array
    {
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return [
                'success' => false,
                'message' => 'Invalid email format'
            ];
        }

        // Validate password is not empty
        if (empty($password)) {
            return [
                'success' => false,
                'message' => 'Password is required'
            ];
        }

        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($userData && password_verify($password, $userData['password'])) {
                // Remove password from returned data
                unset($userData['password']);
                return [
                    'success' => true,
                    'message' => 'Login successful',
                    'user' => $userData
                ];
            }

            return [
                'success' => false,
                'message' => 'Invalid email or password'
            ];
        } catch (\PDOException $e) {
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

    public function logout(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
    }

    public function getUserById(int $id): ?array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$id]);
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($userData) {
                unset($userData['password']);
                return $userData;
            }

            return null;
        } catch (\PDOException $e) {
            return null;
        }
    }

    public function updateUser(int $id, array $data): array
    {
        // Validate if user exists
        $user = $this->getUserById($id);
        if (!$user) {
            return [
                'success' => false,
                'message' => 'User not found'
            ];
        }

        // Check if email is being updated and if it already exists
        if (isset($data['email'])) {
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                return [
                    'success' => false,
                    'message' => 'Invalid email format'
                ];
            }

            if ($this->emailExists($data['email'], $id)) {
                return [
                    'success' => false,
                    'message' => 'Email already in use'
                ];
            }
        }

        // Validate password strength if provided
        if (isset($data['password'])) {
            $passwordValidation = $this->validatePassword($data['password']);
            if (!$passwordValidation['success']) {
                return $passwordValidation;
            }
        }

        // Validate SIRET if updating for buyer
        if (isset($data['siret_number']) && !empty($data['siret_number'])) {
            if (!$this->validateSiretNumber($data['siret_number'])) {
                return [
                    'success' => false,
                    'message' => 'Invalid SIRET number format'
                ];
            }
        }

        try {
            $fields = [];
            $values = [];

            // Common fields
            foreach ($data as $key => $value) {
                if ($key === 'password') {
                    $fields[] = "$key = ?";
                    $values[] = password_hash($value, PASSWORD_DEFAULT);
                } elseif (in_array($key, ['nom', 'email', 'phone_number', 'city'])) {
                    $fields[] = "$key = ?";
                    $values[] = $value;
                }
                // Buyer-specific fields
                elseif (in_array($key, ['company_name', 'activity_type', 'siret_number', 'monthly_purchase_volume', 'delivery_address'])) {
                    $fields[] = "$key = ?";
                    $values[] = $value;
                }
                // Seller-specific fields
                elseif (in_array($key, ['farm_type', 'farm_address', 'monthly_production_capacity', 'certifications'])) {
                    $fields[] = "$key = ?";
                    $values[] = $value;
                }
            }

            if (empty($fields)) {
                return [
                    'success' => false,
                    'message' => 'No valid fields to update'
                ];
            }

            $values[] = $id;
            $sql = "UPDATE users SET " . implode(', ', $fields) . " WHERE id = ?";
            $stmt = $this->db->prepare($sql);

            $result = $stmt->execute($values);

            if ($result) {
                return [
                    'success' => true,
                    'message' => 'User updated successfully'
                ];
            }

            return [
                'success' => false,
                'message' => 'Update failed'
            ];
        } catch (\PDOException $e) {
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

    // Validation helper methods
    private function validateRegistrationData(array $data): array
    {
        // Check required fields (common for both)
        $requiredFields = ['nom', 'email', 'password', 'profile', 'phone_number', 'city'];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                return [
                    'success' => false,
                    'message' => ucfirst($field) . ' is required'
                ];
            }
        }

        // Validate email format
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return [
                'success' => false,
                'message' => 'Invalid email format'
            ];
        }

        // Validate password strength
        $passwordValidation = $this->validatePassword($data['password']);
        if (!$passwordValidation['success']) {
            return $passwordValidation;
        }

        // Validate profile type
        if (!in_array($data['profile'], ['buyer', 'seller'])) {
            return [
                'success' => false,
                'message' => 'Profile must be either buyer or seller'
            ];
        }

        // Validate phone number (basic check)
        if (!is_numeric($data['phone_number']) || strlen((string)$data['phone_number']) < 8 || strlen((string)$data['phone_number']) > 15) {
            return [
                'success' => false,
                'message' => 'Phone number must be numeric and between 8 to 15 digits'
            ];
        }

        // Profile-specific validation
        if ($data['profile'] === 'buyer') {
            $buyerFields = ['company_name', 'activity_type', 'siret_number', 'monthly_purchase_volume', 'delivery_address'];
            foreach ($buyerFields as $field) {
                if (!isset($data[$field]) || empty($data[$field])) {
                    return [
                        'success' => false,
                        'message' => ucfirst(str_replace('_', ' ', $field)) . ' is required for buyers'
                    ];
                }
            }

            // Validate SIRET number
            if (!$this->validateSiretNumber($data['siret_number'])) {
                return [
                    'success' => false,
                    'message' => 'Invalid SIRET number format (14 digits required)'
                ];
            }

            // Validate monthly purchase volume
            if (!is_numeric($data['monthly_purchase_volume']) || $data['monthly_purchase_volume'] < 0) {
                return [
                    'success' => false,
                    'message' => 'Monthly purchase volume must be a positive number'
                ];
            }
        } elseif ($data['profile'] === 'seller') {
            $sellerFields = ['farm_type', 'farm_address', 'monthly_production_capacity'];
            foreach ($sellerFields as $field) {
                if (!isset($data[$field]) || empty($data[$field])) {
                    return [
                        'success' => false,
                        'message' => ucfirst(str_replace('_', ' ', $field)) . ' is required for sellers'
                    ];
                }
            }

            // Validate monthly production capacity
            if (!is_numeric($data['monthly_production_capacity']) || $data['monthly_production_capacity'] < 0) {
                return [
                    'success' => false,
                    'message' => 'Monthly production capacity must be a positive number'
                ];
            }
        }

        return ['success' => true];
    }

    private function validatePassword(string $password): array
    {
        if (strlen($password) < 8) {
            return [
                'success' => false,
                'message' => 'Password must be at least 8 characters long'
            ];
        }

        // Optional: Add more password requirements
        // if (!preg_match('/[A-Z]/', $password)) {
        //     return ['success' => false, 'message' => 'Password must contain at least one uppercase letter'];
        // }

        return ['success' => true];
    }

    private function validateSiretNumber(string $siret): bool
    {
        // SIRET must be 14 digits
        return preg_match('/^\d{14}$/', $siret) === 1;
    }

    public function emailExists(string $email, ?int $excludeUserId = null): bool
    {
        try {
            if ($excludeUserId) {
                $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
                $stmt->execute([$email, $excludeUserId]);
            } else {
                $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
                $stmt->execute([$email]);
            }

            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (\PDOException $e) {
            return false;
        }
    }

    private function userExists(int $id): bool
    {
        try {
            $stmt = $this->db->prepare("SELECT id FROM users WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
