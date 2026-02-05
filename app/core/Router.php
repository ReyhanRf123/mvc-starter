<?php

namespace App\Core;

class Router
{
    protected array $routes = [];

    public function get(string $uri, array $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, array $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $basePath = dirname($_SERVER['SCRIPT_NAME']);

        if ($basePath !== '/' && str_starts_with($uri, $basePath)) {
            $uri = substr($uri, strlen($basePath));
        }

        $uri = '/' . trim($uri, '/');

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 - Route not found";
            return;
        }

        [$controller, $methodName] = $this->routes[$method][$uri];
        $controllerInstance = new $controller;
        $controllerInstance->$methodName();
    }
}
