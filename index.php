<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

use App\Controller\LoginController;
use App\Controller\ProductController;
use App\Controller\CategoryController;
use Framework\Application;

include_once 'vendor/autoload.php';

$app = new Application();

//$app->router->get('/', [ProductController::class, 'getProductList']);
$app->router->get('/product/(\d+)/', [ProductController::class, 'getProductById']);
$app->router->get('/logout/', [LoginController::class, 'logout']);
$app->router->post('/login/send/', [LoginController::class, 'auth']);
$app->router->get('/login/', [LoginController::class, 'login']);
$app->router->post('/register/send/', [LoginController::class, 'authorization']);
$app->router->get('/register/', [LoginController::class, 'register']);

$app->router->get('/', [ProductController::class, 'index']);
//$app->router->get('/getProductListAPI/', [ProductController::class, 'getProductListAPI']);
$app->router->get('/product/', [ProductController::class, 'product']);
//$app->router->get('/product/(\d+)/', [ProductController::class, 'getProductByIdAPI']);
$app->router->get('/getProductListAPI/(\d+)/(\w+)/(\d+)/', [ProductController::class, 'getProductListAPI']);
$app->router->get('/getCategoryAPI/', [CategoryController::class, 'getCategoryAPI']);
$app->router->get('/cart/', [ProductController::class, 'cart']);

$app->run();
