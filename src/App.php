<?php

namespace App;

use App\Router\Router;

class App
{
    public function run ():void
    {
        $router = new Router();

        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = str_replace($this->HOME_FOLDER, '',$uri); // replace folder name added by xampp from uri

        $router->dispatch($uri, $method);
    }
    private $HOME_FOLDER = '/myProj/';
}