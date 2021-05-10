<?php

namespace Framework\Router;

use Framework\Request\Request;

class Router
{
    private Request $request;
    private array $routeMap = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(string $url, $callback)
    {
        $this->routeMap['get'][$url] = $callback;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $url = $this->request->getUrl();
        $callback = $this->routeMap[$method][$url] ?? false;
        if (is_array($callback)) {
            $controller = new $callback[0];
            $callback[0] = $controller;
            $action = $callback[1];
        }
        return call_user_func($callback);
    }
}
