<?php

namespace App\Kernel\Auth;

interface AuthInterface
{
    public function attempt (string $email, string $password) :bool;
    public function user () :?User;
    public function check () :bool;
    public function logout () :void;
    public function table () :string;
    public function email () :string;
    public function login () :string;
    public function password () :string;
    public function sessionField () :string;
}