<?php

namespace App\Kernel\Http;

use App\Kernel\Config\ConfigInterface;

class Redirect implements RedirectInterface
{

    public function __construct(
        private ConfigInterface $config,
    )
    {
        
    }
    public function to (string $path) :void 
    {
        $baseUrl = $this -> config -> get('app.baseUrl');
        header("Location: " . $baseUrl . $path);
        // header("Location: $path");
        exit;
    }
}