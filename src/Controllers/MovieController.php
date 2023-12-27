<?php

namespace App\Controllers;

class MovieController 
{
    public function index () :void 
    {
        include_once APP_PATH . '/viwes/pages/movies.php';
    }
}