<?php

namespace App\Models;

use PDO;

class Seller extends User
{
    protected int $rates;
    protected string $farm_type;
    protected string $farm_address;
    protected float $monthly_production_capacity;
    protected ?string $certifications;

    public function __construct(PDO $db)
    {
        parent::__construct($db);
        $this->profile = 'seller';
        $this->rates = 0;
        $this->certifications = null;
    }

    public function getRates(): int
    {
        return $this->rates;
    }

    public function setRates(int $rates): void
    {
        $this->rates = $rates;
    }

    public function getFarmType(): string
    {
        return $this->farm_type;
    }

    public function setFarmType(string $farm_type): void
    {
        $this->farm_type = $farm_type;
    }

    public function getFarmAddress(): string
    {
        return $this->farm_address;
    }

    public function setFarmAddress(string $farm_address): void
    {
        $this->farm_address = $farm_address;
    }

    public function getMonthlyProductionCapacity(): float
    {
        return $this->monthly_production_capacity;
    }

    public function setMonthlyProductionCapacity(float $monthly_production_capacity): void
    {
        $this->monthly_production_capacity = $monthly_production_capacity;
    }

    public function getCertifications(): ?string
    {
        return $this->certifications;
    }

    public function setCertifications(?string $certifications): void
    {
        $this->certifications = $certifications;
    }
}
