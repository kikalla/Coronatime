<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
	Route::get('register', 'create')->name('create-user')->middleware('guest');
	Route::post('register', 'store')->name('store-user');
	Route::get('/verify', 'verifyUser')->name('verify-user');
});

Route::view('login', 'login')->name('show-login-user')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('logout', [LoginController::class, 'logout'])->name('logout-user')->middleware('auth');
Route::view('confirmation', 'confirmation')->name('show-confirmation');
Route::view('reset/password', 'reset-password')->name('show-reset-password');
Route::get('/', function (User $user) {return view('home', ['user' => $user->where('id', auth()->id())->first()]); })->name('home')->middleware('verified');
Route::view('/verify-first', 'mail.verify-email', )->name('verify-email');
