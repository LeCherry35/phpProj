<?php

namespace App\Kernel\Middleware;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Http\Redirect;
use App\Kernel\Http\RequestInterface;

abstract class AbstractMiddleware
{
    public function __construct(
        protected RequestInterface $request,
        protected AuthInterface $auth,
        protected Redirect  $redirect
    )
    {
        
    }

    public abstract function handle() :void;
}