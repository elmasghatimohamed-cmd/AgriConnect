<?php

namespace Pc\AgriConnect\Controllers;

use Pc\AgriConnect\Core\BaseController;

class MessageController extends BaseController {
    public function index(): void {
        $this->requireAuth();
        
        $user = $this->getUser();
        $this->render('messages.index', [
            'pageTitle' => 'Messages',
            'user' => $user
        ]);
    }
}
