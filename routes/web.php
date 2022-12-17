<?php

use App\Http\Controllers\{AuthController, UserController, LinkController};
use Illuminate\Support\Facades\Route;

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
    Route::get('/', 'create')->name('create');

    // Store new link
    Route::post('/link', 'store')->name('store');

    // Delete link
    Route::delete('/link', 'delete')->name('delete');

    // Redirect
    Route::get('/{code}', 'redirect')->name('redirect');
});
