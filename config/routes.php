<?php

use App\Controllers\AdminController;
use App\Controllers\CategoryController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\MovieController;
use App\Controllers\RegisterController;
use App\Controllers\ReviewController;
use App\Kernel\Router\Route;
use App\Middleware\AdminMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

return [
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/movies', [MovieController::class, 'index']),
    Route::get('/movie', [MovieController::class, 'show']),
    Route::post('/review/add', [ReviewController::class, 'store'], [AuthMiddleware::class]),
    Route::get('/reg', [RegisterController::class, 'index'], [GuestMiddleware::class]),
    Route::post('/reg', [RegisterController::class, 'register']),
    Route::get('/login', [LoginController::class, 'index'], [GuestMiddleware::class]),
    Route::post('/login', [LoginController::class, 'login']),
    Route::post('/logout', [LoginController::class, 'logout']),
    Route::get('/admin', [AdminController::class, 'index'], [AdminMiddleware::class]),
    Route::get('/admin/movies/add', [MovieController::class, 'add'], [AdminMiddleware::class]),
    Route::post('/admin/movies/add', [MovieController::class, 'store'], [AdminMiddleware::class]),
    Route::post('/admin/movies/delete', [MovieController::class, 'delete'], [AdminMiddleware::class]),
    Route::get('/admin/movies/edit', [MovieController::class, 'edit'], [AdminMiddleware::class]),
    Route::post('/admin/movies/edit', [MovieController::class, 'update'], [AdminMiddleware::class]),
    Route::get('/admin/categories/add', [CategoryController::class, 'add'], [AdminMiddleware::class]),
    Route::post('/admin/categories/add', [CategoryController::class, 'store'], [AdminMiddleware::class]),
    Route::post('/admin/categories/delete', [CategoryController::class, 'delete'], [AdminMiddleware::class]),
    Route::get('/admin/categories/edit', [CategoryController::class, 'edit'], [AdminMiddleware::class]),
    Route::post('/admin/categories/edit', [CategoryController::class, 'update'], [AdminMiddleware::class]),
];
