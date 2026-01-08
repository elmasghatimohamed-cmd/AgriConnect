<?php

namespace App\Models;

use PDO;

class Buyer extends User
{
    public function __construct(PDO $db)
    {
        parent::__construct($db);
        $this->profile = 'buyer';
    }
}
