<?php

namespace App\Core;

use Exception;

class Router
{
    protected $routes = [
        "GET" => [],
        "POST" => []
    ];

    public static function load($file)
    {
        $router = new static;

        require "app/".$file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes["GET"][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        if (!array_key_exists($uri, $this->routes[$requestType])) {
            throw new Exception("No route defined for this URI!");
        }

        $this->callAction(
            ...explode('@', $this->routes[$requestType][$uri])
        );

    }

    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;
        if (! method_exists($controller, $action)) {
            throw new Exception("{$action} in {$controller} controller does not exists");
        }

        $controller->$action();
    }
}