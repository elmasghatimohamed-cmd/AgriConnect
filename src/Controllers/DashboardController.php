<?php

namespace Pc\AgriConnect\Controllers;

use Pc\AgriConnect\Core\BaseController;

class DashboardController extends BaseController {
    public function index(): void {
        $this->requireAuth();
        
        $user = $this->getUser();
        $userType = $user['type'] ?? 'farmer';
        
        if ($userType === 'farmer') {
            $this->render('dashboard.farmer', [
                'pageTitle' => 'Tableau de bord - Agriculteur',
                'user' => $user
            ]);
        } else {
            $this->render('dashboard.buyer', [
                'pageTitle' => 'Tableau de bord - Acheteur',
                'user' => $user
            ]);
        }
    }
}
