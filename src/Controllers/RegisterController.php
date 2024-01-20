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
            'login' => ['required', 'min:3', 'max:60'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:20']
        ]);
        if(!$validation) {
            foreach($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('reg');
        }

        $email = $this->request()->input('email');
        $emailExists = $this -> db() -> first('users', [
            'email' => $email
        ]);

        if($emailExists) {
            $this->session()->set('email', ["User with email $email already exists"]);
        }
        $login = $this->request()->input('login');
        $loginExists = $this -> db() -> first('users', [
            'name' => $login
        ]);
        if($loginExists) {
            $this->session()->set('login', ["User with login $login already exists"]);
        }
        if($emailExists || $loginExists) {
            $this->redirect('reg');
        }



        $userId = $this -> db() -> insert('users', [
            'name' => $this -> request() -> input('login'),
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