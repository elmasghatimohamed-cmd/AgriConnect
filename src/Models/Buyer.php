<?php

namespace App\Models;

use PDO;

class Buyer extends User
{
    protected string $company_name;
    protected string $activity_type;
    protected string $siret_number;
    protected float $monthly_purchase_volume;
    protected string $delivery_address;

    public function __construct(PDO $db)
    {
        parent::__construct($db);
        $this->profile = 'buyer';
    }

    public function getCompanyName(): string
    {
        return $this->company_name;
    }

    public function setCompanyName(string $company_name): void
    {
        $this->company_name = $company_name;
    }

    public function getActivityType(): string
    {
        return $this->activity_type;
    }

    public function setActivityType(string $activity_type): void
    {
        $this->activity_type = $activity_type;
    }

    public function getSiretNumber(): string
    {
        return $this->siret_number;
    }

    public function setSiretNumber(string $siret_number): void
    {
        $this->siret_number = $siret_number;
    }

    public function getMonthlyPurchaseVolume(): float
    {
        return $this->monthly_purchase_volume;
    }

    public function setMonthlyPurchaseVolume(float $monthly_purchase_volume): void
    {
        $this->monthly_purchase_volume = $monthly_purchase_volume;
    }

    public function getDeliveryAddress(): string
    {
        return $this->delivery_address;
    }

    public function setDeliveryAddress(string $delivery_address): void
    {
        $this->delivery_address = $delivery_address;
    }
}
