<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

use Framework\Application;

include_once 'vendor/autoload.php';

$app = new Application();

//$app->router->get('/', [\App\Controller\ProductController::class, 'getProductList']);
$app->router->get('/product/(\d+)', [\App\Controller\ProductController::class, 'getProductById']);
$app->router->get('/logout/', [\App\Controller\LoginController::class, 'logout']);
$app->router->post('/login/send/', [\App\Controller\LoginController::class, 'login']);
$app->router->get('/login/', [\App\Controller\LoginController::class, 'register']);

$app->router->get('/', [\App\Controller\ProductController::class, 'index']);
$app->router->get('/api/', [\App\Controller\ProductController::class, 'getProductListAPI']);

$app->run();
