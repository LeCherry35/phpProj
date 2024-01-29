<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\View\View;
use App\Services\MovieService;

class HomeController extends Controller
{
    public function index() :void
    {
        $movies = new MovieService($this->db());

        $this -> view('home', ['movies' => $movies->getFreshMovies()]);
    }
}

