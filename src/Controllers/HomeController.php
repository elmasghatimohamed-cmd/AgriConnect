<?php

namespace Pc\AgriConnect\Controllers;

use Pc\AgriConnect\Core\BaseController;

class HomeController extends BaseController
{
    public function index(): void
    {
        $this->render('home.index', [
            'pageTitle' => 'AXOM - La plateforme de digitalisation agricole'
        ]);
    }
}
