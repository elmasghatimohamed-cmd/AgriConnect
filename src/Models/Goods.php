<?php

namespace App\Models;

use PDO;

class Crop extends Product
{
    protected string $cultivation_date;
    protected string $quality;

    public function __construct(PDO $db)
    {
        parent::__construct($db);
        $this->type = 'crop';
    }

    // Getters
    public function getCultivationDate(): string
    {
        return $this->cultivation_date;
    }

    public function getQuality(): string
    {
        return $this->quality;
    }

    // Setters
    public function setCultivationDate(string $cultivation_date): void
    {
        $this->cultivation_date = $cultivation_date;
    }

    public function setQuality(string $quality): void
    {
        $this->quality = $quality;
    }
}
