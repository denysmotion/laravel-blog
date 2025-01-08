<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function() {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authenticate'])->name('login.authenticate');
});

Route::get('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('admin')->middleware('is_admin')->group(function() {
    Route::get('/', [MainController::class, 'index'])->name('admin.dashboard');
    Route::resource('categories', CategoryController::class);

    Route::resource('tags', TagController::class);

    Route::get('posts/basket', [PostController::class, 'basket'])->name('posts.basket');
    Route::get('posts/basket/{post}/restore', [PostController::class, 'basketRestore'])->name('posts.basket.restore');
    Route::delete('posts/basket/{post}/destroy', [PostController::class, 'basketDestroy'])->name('posts.basket.destroy');
    Route::resource('posts', PostController::class);
});
