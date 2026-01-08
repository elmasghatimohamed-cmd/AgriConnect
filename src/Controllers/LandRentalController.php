<?php

namespace Pc\AgriConnect\Controllers;

use Pc\AgriConnect\Core\BaseController;

class LandRentalController extends BaseController {
    public function index(): void {
        $this->render('land-rental.index', [
            'pageTitle' => 'Location de terrains agricoles'
        ]);
    }

    public function showLand($id): void {
        $this->render('land-rental.detail', [
            'pageTitle' => 'Détails du terrain',
            'landId' => $id
        ]);
    }
}
