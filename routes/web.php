<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::controller(RegisterController::class)->group(function () {
    Route::get('/auth/register', 'view')->name('auth.register');
    Route::post('/auth/register', 'handle')->name('auth.handle_register');
});
