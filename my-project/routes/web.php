<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', ['title' => 'Hello Home']);
});

// Az összes poszt megjelenítése
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Új poszt létrehozása űrlap
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Poszt tárolása
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Adott poszt megjelenítése
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// Adott poszt szerkesztésének űrlapja
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Adott poszt frissítése
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

// Adott poszt törlése
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');