<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\Http\Redirect;
use App\Kernel\Validator\Validator;

class MovieController extends Controller
{
    public function index () :void 
    {
        $this -> view('movies');
    }

    public function add () :void 
    {
        $this -> view('admin/movies/add');
    }

    public function store () :void 
    {
        dd($this -> session());
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
        ]);
        
        if(!$validation) {
            $this->redirect('add');
            dd($this->request()->errors());
        }

        dd('valid AF');
    }
}