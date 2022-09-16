<?php

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

Route::get('register', function () {return view('register'); })->name('create-user');
Route::post('register', [UserController::class, 'store'])->name('store-user');
Route::view('login', 'login')->name('login-user');
Route::view('confirmation', 'confirmation')->name('confirmation');
Route::view('reset/password', 'reset-password')->name('reset-password');
Route::get('/verify', [UserController::class, 'verifyUser'])->name('verify-user');
