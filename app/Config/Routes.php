<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// 1. Halaman Depan (Bisa diakses siapa saja)
$routes->get('/', 'Home::index');

// 2. Login & Logout
$routes->get('/login', 'AuthController::index');
$routes->post('/login/auth', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');

// 3. AREA KHUSUS (Harus Login Dulu)
$routes->group('', ['filter' => 'auth'], function($routes) {
    
    // Fitur Prediksi (Dashboard Utama)
    $routes->get('/prediction', 'PredictionController::index');
    $routes->post('/prediction/process', 'PredictionController::process');
    $routes->get('/prediction/pdf/(:num)', 'PredictionController::printPdf/$1');
    
    // Nanti Anda tambahkan route Dataset & History disini:
    // $routes->get('/dataset', 'DatasetController::index');
    // $routes->get('/history', 'HistoryController::index');
});