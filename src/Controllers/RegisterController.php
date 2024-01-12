<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class RegisterController extends Controller
{
    public function index() :void
    {
        $this->view('register');
    }

    public function register() 
    {
        $validation = $this-> request() -> validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:20']
        ]);
        if(!$validation) {
            foreach($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('reg');
        }

        $userId = $this -> db() -> insert('users', [
            'email' => $this -> request() -> input('email'),
            'password' => password_hash($this -> request() -> input('password'), PASSWORD_DEFAULT)
        ]);

        if(!$userId) {
            $this->session()->set('error', 'Something went wrong');
            $this->redirect('reg');
        }

        $this->redirect('login');
    }
}