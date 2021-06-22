<?php

use App\Controller\Admin\AdminCategoryController;
use App\Controller\Admin\AdminProductController;
use App\Controller\LoginController;
use App\Controller\ProductController;
use App\Controller\CategoryController;
use Framework\Application;

$app = new Application();

//$app->router->get('/', [ProductController::class, 'getProductList']);
$app->router->get('/product/(\d+)/', [ProductController::class, 'getProductById']);

$app->router->post('/login/send/', [LoginController::class, 'auth']);
$app->router->get('/login/', [LoginController::class, 'login']);

$app->router->post('/register/send/', [LoginController::class, 'authorization']);
$app->router->get('/register/', [LoginController::class, 'register']);

$app->router->get('/logout/', [LoginController::class, 'logout']);

/* API */

$app->router->get('/', [ProductController::class, 'index']);
//$app->router->get('/getProductListAPI/', [ProductController::class, 'getProductListAPI']);
$app->router->get('/product/', [ProductController::class, 'product']);
//$app->router->get('/product/(\d+)/', [ProductController::class, 'getProductByIdAPI']);
$app->router->get('/getProductListAPI/(\d+)/(\w+)/(\d+)/', [ProductController::class, 'getProductListAPI']);
$app->router->get('/getCategoryAPI/', [CategoryController::class, 'getCategoryAPI']);
$app->router->get('/cart/', [ProductController::class, 'cart']);
$app->router->get('/getCountPages/', [ProductController::class, 'getCountPages']);

/* AdminPanel */

// Admin Product //

$app->router->get('/getProductAdmin/', [AdminProductController::class, 'getProductAdmin']);
$app->router->get('/deleteProduct/(\d+)/', [AdminProductController::class, 'deleteProduct']);
$app->router->get('/createProduct/', [AdminProductController::class, 'createProductPage']);
$app->router->post('/createProductSend/', [AdminProductController::class, 'createProduct']);
$app->router->get('/updateProductPage/(\d+)/', [AdminProductController::class, 'updateProductPage']);
$app->router->post('/updateProductSend/', [AdminProductController::class, 'updateProduct']);

// Admin Category //

$app->router->get('/getCategoryAdmin/', [AdminCategoryController::class, 'getCategoryAdmin']);
$app->router->get('/deleteCategory/(\d+)/', [AdminCategoryController::class, 'deleteCategory']);
$app->router->get('/createCategory/', [AdminCategoryController::class, 'createCategoryPage']);
$app->router->post('/createCategorySend/', [AdminCategoryController::class, 'createCategory']);

$app->run();
