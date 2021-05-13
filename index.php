<?php

use Framework\Application;
use Framework\Router\Router;

include_once __DIR__ . '/autoloader.php';
$autoloader = new Autoloader();
spl_autoload_register([$autoloader, 'load']);

$app = new Application();

$app->router->get('/', [\App\Controller\ProductController::class, 'getProductList']);
$app->router->get('/product/{id}', [\App\Controller\ProductController::class, 'getProductById']);
$app->router->get('/login', [\App\Controller\LoginController::class, 'login']);
$app->router->get('/logout', [\App\Controller\LoginController::class, 'logout']);
$app->router->post('/login', [\App\Controller\LoginController::class, 'login']);

$app->run();
