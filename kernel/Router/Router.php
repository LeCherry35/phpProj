<?php

namespace App\Kernel\Router;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Session\Session;
use App\Kernel\View\View;

class Router 
{
    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function __construct(
        private View $view,
        private Request $request,
        private Redirect $redirect,
        private Session $session,
    )
    {
        $this->initRoutes();
        
    }

    public function dispatch(string $uri, string $method):void
    {
        $route = $this -> findRoute($uri, $method);

        if(!$route) {
            $this -> notFound();
        }
        if(is_array($route->getAction())) {

            [$controller, $action] = $route->getAction();

            $controller = new $controller();

            call_user_func([$controller, 'setView'], $this -> view);
            call_user_func([$controller, 'setRequest'], $this -> request);
            call_user_func([$controller, 'setRedirect'], $this -> redirect);
            call_user_func([$controller, 'setSession'], $this -> session);
            call_user_func([$controller, $action]);
        } else {

            $route->getAction()();
        }
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
