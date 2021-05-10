<?php

use Framework\Application;
use Framework\Router\Router;

include_once __DIR__ . '/autoloader.php';
$autoloader = new Autoloader();
spl_autoload_register([$autoloader, 'load']);

