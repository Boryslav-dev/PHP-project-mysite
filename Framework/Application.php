<?php

namespace Framework;

use Framework\Database\Database;
use Framework\Request\Request;
use Framework\Router\Router;

class Application
{
    public static Application $app;

    public Router $router;

    public Request $request;

    public Database $db;


    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->db = new Database();
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}