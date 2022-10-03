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
	Route::post('/register', 'store')->name('user.store');
	Route::get('/verify', 'verifyUser')->name('user.verify');
});

Route::middleware('guest')->group(function () {
	Route::view('/register', 'register')->name('user.create');
	Route::view('/login', 'login')->name('login.show');
	Route::post('/login', [LoginController::class, 'login'])->name('login');
	Route::view('/forgot-password', 'forgot-password')->name('forgot-password.show');
});

Route::middleware('verified')->group(function () {
	Route::get('/', [CountryController::class, 'getSum'])->name('home');
	Route::get('/countries', [CountryController::class, 'postData'])->name('countries.show');
});

Route::middleware('auth')->group(function () {
	Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');
	Route::view('/verify-first', 'mail.verify-email', )->name('verify-email');
});

Route::view('/confirmation', 'confirmation')->name('confirmation.show');
Route::view('/reset-send', 'reset-send')->name('reset-send.show');

Route::get('/reset-password/{token}', [UserController::class, 'resetPassword'])->name('password.reset');

Route::post('reset-password/{token}', [UserController::class, 'updatePassword']);

Route::post('/forgot-password', [UserController::class, 'forgotPassword']);
