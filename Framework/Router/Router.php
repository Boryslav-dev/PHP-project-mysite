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
        $url = '/^' . str_replace('/', '\/', $url) . '$/';
        $this->routeMap[$url] = $callback;
    }

    public function post(string $url, $callback)
    {
        $url = '/^' . str_replace('/', '\/', $url) . '$/';
        $this->routeMap[$url] = $callback;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $url = $this->request->getUrl();
        foreach ($this->routeMap as $pattern => $callback) {
            if (preg_match($pattern, $url, $params)) {
                $controller = new $callback[0]();
                $callback[0] = $controller;
                array_shift($params);
                return call_user_func_array($callback, $params);
            }
        }
    }
}
