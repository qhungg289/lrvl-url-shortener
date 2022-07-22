<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    return view('index');
});

Route::controller(AuthController::class)->group(function () {
    // Sign up
    Route::get('/signup', 'get_signup')->name('signup')->middleware('guest');
    Route::post('/signup', 'post_signup');

    // Log in
    Route::get('/login', 'get_login')->name('login')->middleware('guest');
    Route::post('/login', 'post_login');

    // Log out
    Route::post('/logout', 'logout');
});

// Profile
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::controller(LinkController::class)->group(function () {
    // Create link form
    Route::get('/link/create', 'create')->name('create');

    Route::post('/link', 'store');

    Route::delete('/link/delete/', 'delete');

    // Redirect
    Route::get('/{code}', 'redirect');
});
