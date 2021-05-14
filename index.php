<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use Framework\Application;
use Framework\Router\Router;

include_once 'vendor/autoload.php';

$app = new Application();

$app->router->get('/', [\App\Controller\ProductController::class, 'getProductList']);
$app->router->get('/product/{id}', [\App\Controller\ProductController::class, 'getProductById']);
$app->router->get('/login', [\App\Controller\LoginController::class, 'authorization']);
$app->router->get('/logout', [\App\Controller\LoginController::class, 'logout']);
$app->router->post('/login', [\App\Controller\LoginController::class, 'login']);

$app->run();
