<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once BASEPATH . './core/Routes.php';
include_once BASEPATH . './controller/AuthController.php';
include_once BASEPATH . './controller/FallbackController.php';
include_once BASEPATH . './controller/DashboardController.php';

$route = new Route();

$route->get('/', function() {
  Route::redirect('login');
});

$route->get('/login', [AuthController::class, 'login']);
$route->get('/register', [AuthController::class, 'register']);

$route->post('/logout', [AuthController::class, 'logout']);
$route->post('/login/process', [AuthController::class, 'handle_login']);
$route->post('/register/process', [AuthController::class, 'handle_register']);

$route->get('/dashboard', [DashboardController::class, 'index']);

$route->any('/fallback', [FallbackController::class, 'index']);