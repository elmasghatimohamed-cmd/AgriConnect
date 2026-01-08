<?php

namespace Pc\AgriConnect\Controllers;

use Pc\AgriConnect\Core\BaseController;

class MarketplaceController extends BaseController {
    public function index(): void {
        $this->render('marketplace.index', [
            'pageTitle' => 'Marketplace - Produits Agricoles'
        ]);
    }

    public function showProduct($id): void {
        $this->render('marketplace.product', [
            'pageTitle' => 'Détails du produit',
            'productId' => $id
        ]);
    }
}
