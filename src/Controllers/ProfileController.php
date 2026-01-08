<?php

namespace Pc\AgriConnect\Controllers;

use Pc\AgriConnect\Core\BaseController;

class ProfileController extends BaseController {
    public function index(): void {
        $this->requireAuth();
        
        $user = $this->getUser();
        $this->render('profile.index', [
            'pageTitle' => 'Mon profil',
            'user' => $user
        ]);
    }
}
