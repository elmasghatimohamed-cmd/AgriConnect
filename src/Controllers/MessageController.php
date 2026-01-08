<?php

namespace Pc\AgriConnect\Controllers;

use Pc\AgriConnect\Core\BaseController;

class MessageController extends BaseController {
    public function index(): void {
        $this->render('messages.index', [
            'pageTitle' => 'Messages'
        ]);
    }
}
