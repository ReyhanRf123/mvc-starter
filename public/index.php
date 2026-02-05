<?php
define('BASE_URL', '/mvc-starter/public');
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\AdminController;

$router = new Router();

//home
$router->get('/', [HomeController::class, 'index']);

//authentication
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'authenticate']);
$router->get('/logout', [AuthController::class, 'logout']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'store']);

//dashboard & admin
$router->get('/dashboard', [DashboardController::class, 'index']);
$router->get('/admin', [AdminController::class, 'index']);

$router->run();
