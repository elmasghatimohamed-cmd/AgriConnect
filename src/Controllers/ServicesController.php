<?php

namespace Pc\AgriConnect\Controllers;

use Pc\AgriConnect\Core\BaseController;

class ServicesController extends BaseController {
    public function index(): void {
        $this->requireAuth();
        
        $user = $this->getUser();
        $this->render('services.index', [
            'pageTitle' => 'Services Agricoles',
            'user' => $user
        ]);
    }
    
    public function logistics(): void {
        $this->requireAuth();
        
        $user = $this->getUser();
        $this->render('services.logistics', [
            'pageTitle' => 'Services Logistiques',
            'user' => $user
        ]);
    }
    
    public function sensors(): void {
        $this->requireAuth();
        
        $user = $this->getUser();
        $this->render('services.sensors', [
            'pageTitle' => 'Capteurs et IoT',
            'user' => $user
        ]);
    }
    
    public function weather(): void {
        $this->requireAuth();
        
        $user = $this->getUser();
        $this->render('services.weather', [
            'pageTitle' => 'Météo et Saisons',
            'user' => $user
        ]);
    }
    
    public function statistics(): void {
        $this->requireAuth();
        
        $user = $this->getUser();
        $this->render('services.statistics', [
            'pageTitle' => 'Statistiques Agricoles',
            'user' => $user
        ]);
    }
}
