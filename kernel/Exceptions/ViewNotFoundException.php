<?php

namespace App\Kernel\Exceptions;

class ViewNotFoundException extends \Exception
{
    public function __construct(string $message)
    {
        echo $message;
    }

}