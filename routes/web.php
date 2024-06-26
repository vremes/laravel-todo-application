<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserHomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $isAuthenticated = Auth::check();

    if ($isAuthenticated) {
        return redirect()->route('user_home.index');
    }

    return redirect()->route('auth.login');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/auth/register', 'view')->name('auth.register');
    Route::post('/auth/register', 'handle')->name('auth.handle_register');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/auth/login', 'view')->name('auth.login');
    Route::post('/auth/login', 'handle')->name('auth.handle_login');
    Route::get('/auth/logout', 'logout')->name('auth.logout');
});

Route::controller(UserHomeController::class)->group(function () {
    Route::get('/home', 'index')->name('user_home.index');
})->middleware('auth');

Route::controller(TodoController::class)->group(function () {
    Route::post('/todos', 'create')->name('todos.create');
    Route::post('/todos/{id}/delete', 'delete')->name('todos.delete');
});

Route::get('/set-locale/{locale}', [LocaleController::class, 'set'])->name('app.set_locale');
