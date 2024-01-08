<?php

namespace App\Kernel\Http;

class Redirect implements RedirectInterface
{
    public function to (string $path) :void 
    {
        header("Location: $path");
        exit;
    }
}