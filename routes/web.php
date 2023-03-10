<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

Route::controller(UserController::class)->group(function () {
	Route::post('/register', 'store')->name('user.store');
	Route::get('/verify', 'verifyUser')->name('user.verify');
	Route::post('reset-password/{token}', 'updatePassword')->name('password.update');
	Route::post('/forgot-password', 'forgotPassword')->name('mail-password-reset');
	Route::get('/reset-password/{token}', 'resetPassword')->name('password.reset');
});

Route::middleware('guest')->group(function () {
	Route::view('/register', 'register')->name('user.create');
	Route::view('/login', 'login')->name('login.show');
	Route::post('/login', [LoginController::class, 'login'])->name('login');
	Route::view('/forgot-password', 'forgot-password')->name('forgot-password.show');
});

Route::middleware('verified')->group(function () {
	Route::get('/', [CountryController::class, 'getSum'])->name('home');
	Route::get('/countries', [CountryController::class, 'searchAndDisplayCountries'])->name('countries.show');
});

Route::middleware('auth')->group(function () {
	Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');
	Route::view('/verify-first', 'mail.verify-email', )->name('verify-email');
});

Route::view('/confirmation', 'confirmation')->name('confirmation.show');
Route::view('/reset-send', 'reset-send')->name('reset-send.show');

Route::get('/change-locale/{locale}', [LanguageController::class, 'change'])->name('locale-change');
