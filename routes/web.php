<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/signup', 'get_signup')->name('signup')->middleware('guest');
    Route::post('/signup', 'post_signup');

    Route::get('/login', 'get_login')->name('login')->middleware('guest');
    Route::post('/login', 'post_login');

    Route::post('/logout', 'logout');
});

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::controller(LinkController::class)->group(function () {
    Route::get('/link', 'create');
    Route::post('/link', 'store');
    Route::get('/{code}', 'redirect');
});
