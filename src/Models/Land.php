<?php

namespace App\Models;

use PDO;

class Land extends Product
{
    protected float $size;
    protected string $location;
    protected string $weather;
    protected string $quality;

    public function __construct(PDO $db)
    {
        parent::__construct($db);
        $this->type = 'land';
    }

    // Getters
    public function getSize(): float
    {
        return $this->size;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getWeather(): string
    {
        return $this->weather;
    }

    public function getQuality(): string
    {
        return $this->quality;
    }

    // Setters
    public function setSize(float $size): void
    {
        $this->size = $size;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function setWeather(string $weather): void
    {
        $this->weather = $weather;
    }

    public function setQuality(string $quality): void
    {
        $this->quality = $quality;
    }
}
