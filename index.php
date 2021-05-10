<?php

use Framework\Application;
use Framework\Router\Router;

include_once __DIR__ . '/../autoloader.php';
$autoloader = new Autoloader();
spl_autoload_register([$autoloader, 'load']);

var_dump($_SERVER);

$app = new Application();

$app->router->get('/', [\App\Controller\ProductController::class, 'getProductList']);

$app->run();

?>
