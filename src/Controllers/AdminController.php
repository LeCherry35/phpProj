<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;

class AdminController extends Controller
{
    public function index() :void
    {
       $categoryService =  new CategoryService($this->db());
        $categories = $categoryService->getCategories();
        $this->view('admin/index',['categories' => $categories]);
    }
}