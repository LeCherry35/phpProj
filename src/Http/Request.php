<?php

namespace App\Http;

class Request
{
    private function __construct(
        public readonly array $get,
        public readonly array $post,
        public readonly array $server,
        public readonly array $files,
        public readonly array $cookies,
    ){
    }

    public static function createFromGlobals(): static
    {
        return new static($_GET, $_POST, $_SERVER, $_FILES, $_COOKIE);
    }

    public function uri():string
    {
        $HOME_FOLDER = '/myProj/';

        return strtok(str_ireplace($HOME_FOLDER, '',$this->server['REQUEST_URI']), '?');
         
    }

    public function method():string
    {
        return $this -> server['REQUEST_METHOD'];
    }

}