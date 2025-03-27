<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Google Login Routes
Route::get('login', [LoginController::class, 'redirectToGoogle'])->name('login');
Route::get('auth/callback', [LoginController::class, 'handleGoogleCallback']);
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
