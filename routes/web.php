<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController as UserController;
use App\Http\Controllers\Admin\CategoryController as CategoryController;
use App\Http\Controllers\Admin\MainController as MainController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function() {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authenticate'])->name('login.authenticate');
});

Route::prefix('admin')->group(function() {
    Route::get('/', [MainController::class, 'index'])->name('admin.dashboard');
    Route::resource('categories', CategoryController::class);
})->middleware('is_admin');
