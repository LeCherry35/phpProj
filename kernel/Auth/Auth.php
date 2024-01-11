<?php

namespace App\Kernel\Auth;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Config\ConfigInterface;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Session\SessionInterface;
use PSpell\Config;

class Auth implements AuthInterface
{

    public function __construct (
        private DatabaseInterface $db, 
        private SessionInterface $session,
        private ConfigInterface $config,
        )
    {
    }
    public function attempt (string $username, string $password) :bool
    {
        $user = $this -> db -> first($this -> table(), [$this -> username() => $username]);

        if(!$user) {
            return false;
        }

        if(!password_verify($password, $user[$this -> password()])) {
            return false;
        }

        $this -> session -> set($this->sessionField(), $user['id']);

        return true;
    }

    public function user () :?array
    {
        return $_SESSION['user'] ?? null;
    }

    public function check () :bool
    {
        return isset($_SESSION['user']);
    }

    public function logout () :void
    {
        unset($_SESSION['user']);
    }

    public function table () :string
    {
        return $this -> config -> get('auth.table', 'users');
    }

    public function username () :string
    {
        return $this -> config -> get('auth.username', 'email');
    }

    public function password () :string
    {
        return $this -> config -> get('auth.password', 'password');
    }

    public function sessionField () :string
    {
        return $this -> config -> get('auth.session_field', 'user_id');
    }
}