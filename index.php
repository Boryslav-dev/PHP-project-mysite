<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use Dotenv\Dotenv;

include_once 'vendor/autoload.php';
include_once 'routes/web.php';

$envName = getenv('APP_ENV') === 'testing' ? '.env.testing' : '.env';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
