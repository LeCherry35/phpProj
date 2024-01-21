<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;

class CategoryController extends Controller  
{
    private CategoryService $service;

    public function add () :void 
    {
        $this -> view('admin/categories/add');
    }

    public function store () :void 
    {
        $validation = $this->request()->validate([
            'catName' => ['required', 'min:3', 'max:100'],
        ]);
        
        if(!$validation) {
            foreach($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('admin/categories/add');
        }
        
        
        $this->service()->addCategory($this->request()->input('catName'));

        $this->redirect('admin/categories/add');
    }

    public function delete () :void 
    {
        $id = $this->request()->input('id');
        $this->service()->delete($id);
        $this->redirect('admin');
    }

    public function edit () :void 
    {   
        $category = $this->service()->getCategory($this->request()->input('id'));
        $this->view('admin/categories/edit',['category'=>$category]);
    }

    public function update () :void 
    {
        $validation = $this->request()->validate([
            'catName' => ['required', 'min:3', 'max:100'],
        ]);
        
        if(!$validation) {
            foreach($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('admin/categories/edit?id='.$this->request()->input('id'));
        }
        
        $this->service()->update($this->request()->input('id'), $this->request()->input('catName'));

        $this->redirect('admin');
    }

    private function service(): CategoryService
    {
        if (! isset($this->service)) {
            $this->service = new CategoryService($this->db());
        }

        return $this->service;
    }
}