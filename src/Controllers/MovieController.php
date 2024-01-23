<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;
use App\Services\MovieService;

class MovieController extends Controller
{
    private MovieService $service;

    public function index () :void 
    {
        $this -> view('movies');
    }

    public function add () :void 
    {   
        $categories = new CategoryService($this->db());
        $this -> view('admin/movies/add',['categories' => $categories->getCategories()]);
    }

    public function store () :void 
    {
        $file = $this->request()->file('image');

        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'description' => ['required'],
            'category' => ['required'],
        ]);
        
        if(!$validation) {
            foreach($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('admin/movies/add');
        }
        
        $this->service()->store(
            $this->request()->input('name'),
            $this->request()->input('description'),
            $this->request()->input('category'),
            $file,
        );

        $this->redirect('admin/movies/add');

    }

    public function delete () :void 
    {
        $id = $this->request()->input('id');
        $this->service()->delete($id);
        $this->redirect('admin');
    }
    private function service() 
    {
        if(!isset($this->service)) {
            $this->service = new MovieService($this->db());
        }
        return $this->service;
    }

}