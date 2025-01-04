<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController as MainController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/admin', [MainController::class, 'index'])->name('admin.dashboard');
