<?php

namespace App\Services;

use App\Models\User;
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

    public function register(array $userData): bool
    {
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

            // Insert into database
            $stmt = $this->db->prepare(
                "INSERT INTO users (nom, email, password, profile, phone_number, city) 
                 VALUES (?, ?, ?, ?, ?, ?)"
            );

            return $stmt->execute([
                $user->getNom(),
                $user->getEmail(),
                $user->getPassword(),
                $user->getProfile(),
                $user->getPhoneNumber(),
                $user->getCity()
            ]);
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function login(string $email, string $password): ?array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($userData && password_verify($password, $userData['password'])) {
                // Remove password from returned data
                unset($userData['password']);
                return $userData;
            }

            return null;
        } catch (\PDOException $e) {
            return null;
        }
    }

    public function logout(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
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

    public function updateUser(int $id, array $data): bool
    {
        try {
            $fields = [];
            $values = [];

            foreach ($data as $key => $value) {
                if ($key === 'password') {
                    $fields[] = "$key = ?";
                    $values[] = password_hash($value, PASSWORD_DEFAULT);
                } elseif (in_array($key, ['nom', 'email', 'phone_number', 'city'])) {
                    $fields[] = "$key = ?";
                    $values[] = $value;
                }
            }

            if (empty($fields)) {
                return false;
            }

            $values[] = $id;
            $sql = "UPDATE users SET " . implode(', ', $fields) . " WHERE id = ?";
            $stmt = $this->db->prepare($sql);

            return $stmt->execute($values);
        } catch (\PDOException $e) {
            return false;
        }
    }
}
