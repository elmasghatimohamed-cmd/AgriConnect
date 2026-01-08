<?php

namespace App\Models;

use PDO;

class Seller extends User
{
    protected int $rates;

    public function __construct(PDO $db)
    {
        parent::__construct($db);
        $this->profile = 'seller';
        $this->rates = 0;
    }

    public function getRates(): int
    {
        return $this->rates;
    }

    public function setRates(int $rates): void
    {
        $this->rates = $rates;
    }
}
