<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\LoginController;
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

Route::controller(UserController::class)->group(function () {
	Route::post('register', 'store')->name('user.store');
	Route::get('/verify', 'verifyUser')->name('user.verify');
});
Route::view('register', 'register')->name('user.create')->middleware('guest');

Route::view('login', 'login')->name('login.show')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('logout', [LoginController::class, 'logout'])->name('user.logout')->middleware('auth');
Route::view('confirmation', 'confirmation')->name('confirmation.show');
Route::view('reset/password', 'reset-password')->name('reset-password.show');
Route::view('/', 'home')->name('home')->middleware('verified');
Route::get('/', [CountryController::class, 'getSum'])->name('get-data')->middleware('verified');
Route::view('/verify-first', 'mail.verify-email', )->name('verify-email');

Route::get('api', [CountryController::class, 'getData']);
