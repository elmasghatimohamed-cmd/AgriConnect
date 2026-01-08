<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

session_start();

use Pc\AgriConnect\Core\Router;

$router = new Router();

$router->get('/', 'HomeController', 'index');
$router->get('/login', 'AuthController', 'showLogin');
$router->post('/login', 'AuthController', 'login');
$router->get('/register/farmer', 'AuthController', 'showFarmerRegister');
$router->get('/register/buyer', 'AuthController', 'showBuyerRegister');
$router->post('/register/farmer', 'AuthController', 'registerFarmer');
$router->post('/register/buyer', 'AuthController', 'registerBuyer');
$router->get('/logout', 'AuthController', 'logout');

$router->get('/marketplace', 'MarketplaceController', 'index');
$router->get('/marketplace/product/{id}', 'MarketplaceController', 'showProduct');
$router->get('/land-rental', 'LandRentalController', 'index');
$router->get('/land-rental/{id}', 'LandRentalController', 'showLand');
$router->get('/dashboard', 'DashboardController', 'index');
$router->get('/profile', 'ProfileController', 'index');
$router->get('/messages', 'MessageController', 'index');

// Services Routes
$router->get('/services', 'ServicesController', 'index');
$router->get('/services/logistics', 'ServicesController', 'logistics');
$router->get('/services/sensors', 'ServicesController', 'sensors');
$router->get('/services/weather', 'ServicesController', 'weather');
$router->get('/services/statistics', 'ServicesController', 'statistics');

// API Routes
$router->get('/api/products', 'ApiController', 'products');
$router->get('/api/lands', 'ApiController', 'lands');
$router->get('/api/messages', 'ApiController', 'messages');
$router->get('/api/sensors', 'ApiController', 'sensorData');
$router->get('/api/weather', 'ApiController', 'weatherData');
$router->get('/api/statistics', 'ApiController', 'agriculturalStatistics');

$router->dispatch();

