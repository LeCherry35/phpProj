<?php

namespace App\Kernel\Session;

class Session {

    public function __construct()
    {
        session_start();
    }

    public function set (string $key, $value) :void 
    {
        $_SESSION[$key] = $value;
    }  

    public function get (string $key, $default = null) :mixed 
    {
        return $_SESSION[$key] ?? $default;
    }

    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function getFlash (string $key) :mixed 
    {
        $value = $this -> get($key);
        $this -> remove($key);
        return $value;
    }

    public function remove (string $key) :void 
    {
        unset($_SESSION[$key]);
    }

    public function destroy () :void 
    {
        session_destroy();
    }


}