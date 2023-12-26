<?php

$PROJ_DIR = '/myproj';
use App\Router\Route;

return [
    Route::get('home', function () {
        require_once APP_PATH . '/viwes/pages/home.php';
    }),
    Route::get('movies', function () {
        require_once APP_PATH . '/viwes/pages/movies.php';
    }),
];
