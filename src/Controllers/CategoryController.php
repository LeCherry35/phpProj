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
        
        
        $id = $this->db()->insert('categories', [
            'name' => $this->request()->input('catName'),
        ]);

        $this->redirect('admin/categories/add');
    }

    public function delete () :void 
    {
        $id = $this->request()->input('id');
        $this->service()->delete($id);
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