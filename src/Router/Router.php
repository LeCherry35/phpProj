<?php

namespace App\Router;

class Router 
{
    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function __construct()
    {
        $this->initRoutes();
        
    }

    public function dispatch(string $uri, string $method):void
    {
        $route = $this -> findRoute($uri, $method);

        if(!$route) {
            $this -> notFound();
        }

        $route->getAction()();
    }

    private function notFound():void
    {
        exit('404 | NOT FOUND');
    }

    private function findRoute (string $uri, string $method) : Route|false 
    {
        if(!isset($this -> routes[$method][$uri])) {
            return false;
        }
        return $this -> routes[$method][$uri];
    }

    private function initRoutes() {
        $routes = $this -> getRoutes();

        foreach($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }

    private function getRoutes ():array
    {
        return require_once APP_PATH . '/config/routes.php';
    }
}
