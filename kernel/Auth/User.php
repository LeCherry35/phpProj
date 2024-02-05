<?php

namespace App\Kernel\Auth;

class User 
{
    public function __construct(
        private int $id,
        private string $email,
        private string $login,
        private string $password,
        private bool $isAdmin
    )
    {}

    public function id() :int
    {
        return $this->id;
    }

    public function email() :string
    {
        return $this->email;
    }  

    public function login() :string
    {
        return $this->login;
    }

    public function password() :string
    {
        return $this->password;
    }

    public function isAdmin() :bool
    {
        return $this->isAdmin;
    }

}