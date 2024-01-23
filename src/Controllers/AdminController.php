<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;
use App\Services\MovieService;

class AdminController extends Controller
{
    public function index() :void
    {
        $categoryService =  new CategoryService($this->db());   
        $categories = $categoryService->getCategories();

        $movieService = new MovieService($this->db());
        $movies = $movieService->getMovies();

        $this->view('admin/index',['categories' => $categories, 'movies' => $movies]);
    }
}