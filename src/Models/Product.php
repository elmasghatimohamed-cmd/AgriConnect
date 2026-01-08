<?php

namespace App\Models;

use PDO;

abstract class Product
{
    protected int $id;
    protected string $title;
    protected string $description;
    protected float $price;
    protected int $seller_id;
    protected string $type;
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getSellerId(): int
    {
        return $this->seller_id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDb(): PDO
    {
        return $this->db;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setSellerId(int $seller_id): void
    {
        $this->seller_id = $seller_id;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
