<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController, App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', ['title' => 'Hello Home']);
});

Route::get('/404', function () {
    return view('404');
});



Route::get('/posts', [PostController::class, 'showPost']);
Route::get('/create-post', [PostController::class, 'showCreatePost']);
Route::post('/create', [PostController::class, 'createPost']);
Route::get('/posts/{id}/edit', [PostController::class, 'editPost']);
Route::put('/posts/{id}', [PostController::class, 'updatePost']);

Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');


