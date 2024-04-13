<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserHomeController;
use Illuminate\Support\Facades\Route;

Route::controller(RegisterController::class)->group(function () {
    Route::get('/auth/register', 'view')->name('auth.register');
    Route::post('/auth/register', 'handle')->name('auth.handle_register');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/auth/login', 'view')->name('auth.login');
    Route::post('/auth/login', 'handle')->name('auth.handle_login');
});

Route::controller(UserHomeController::class)->group(function () {
    Route::get('/', 'index')->name('user_home.index');
})->middleware('auth');
