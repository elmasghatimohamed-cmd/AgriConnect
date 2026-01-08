<?php

namespace App\Models;

use PDO;

abstract class User
{
    protected int $id;
    protected string $nom;
    protected string $email;
    protected string $password;
    protected string $profile;
    protected int $phone_number;
    protected string $city;
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getProfile(): string
    {
        return $this->profile;
    }

    public function getPhoneNumber(): int
    {
        return $this->phone_number;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    // Setters
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setProfile(string $profile): void
    {
        $this->profile = $profile;
    }

    public function setPhoneNumber(int $phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }
}
