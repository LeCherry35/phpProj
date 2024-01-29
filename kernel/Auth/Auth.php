<?php

namespace App\Kernel\Auth;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Config\ConfigInterface;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Http\RedirectInterface;
use App\Kernel\Session\SessionInterface;

class Auth implements AuthInterface
{

    public function __construct (
        private DatabaseInterface $db, 
        private SessionInterface $session,
        private ConfigInterface $config,
        private RedirectInterface $redirect,
        )
    {
    }
    public function attempt (string $username, string $password) :bool
    {
        $user = $this -> db -> first($this -> table(), [$this -> email() => $username]);

        if(!$user) {
            $this->session->set('error', 'No user found with this email');
            $this->redirect->to('login');
        }
        if(!password_verify($password, $user[$this -> password()])) {
            $this->session->set('error', 'Wrong password');
            $this->redirect->to('login');
        }

        $this -> session -> set($this->sessionField(), $user['id']);

        return true;
    }

    public function user () :?User
    {
        // return $_SESSION['user'] ?? null;
        if (!$this -> check()) {
            return null;
        }

        $user = $this -> db -> first($this -> table(), ['id' => $this -> session -> get($this -> sessionField())]);
        if($user) {
            return new User(
                $user['id'],
                $user[$this -> email()],
                $user[$this -> login()],
                $user[$this -> password()],

            );
        }
        return null;
    }

    public function check () :bool
    {
        // return isset($_SESSION['user']);
        return $this ->session -> has($this -> sessionField());
    }

    public function logout () :void
    {
        $this -> session -> remove($this -> sessionField());
    }

    public function table () :string
    {
        return $this -> config -> get('auth.table', 'users');
    }

    public function email () :string
    {
        return $this -> config -> get('auth.email', 'email');
    }

    public function login () :string
    {
        return $this -> config -> get('auth.login', 'name');
    }

    public function password () :string
    {
        return $this -> config -> get('auth.password', 'password');
    }

    public function sessionField () :string
    {
        return $this -> config -> get('auth.session_field', 'user_id');
    }

    public function userId () :?int
    {
        return $this -> session -> get($this -> sessionField());
    }
}