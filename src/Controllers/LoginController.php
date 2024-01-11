<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return $this->view('login');
    }

    public function login()

    {
        $email = $this->request()->input('email');
        $password = $this->request()->input('password');
        dd($this->auth()->attempt($email, $password),$_SESSION);
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];

    //     $user = $this->db->selectOne('users', ['email' => $email]);

    //     if (!$user) {
    //         return $this->redirect('/login');
    //     }

    //     if (!password_verify($password, $user['password'])) {
    //         return $this->redirect('/login');
    //     }

    //     $_SESSION['user'] = $user;

    //     return $this->redirect('/home');
    }

    // public function logout()
    // {
    //     unset($_SESSION['user']);

    //     return $this->redirect('/home');
    // }
}