<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		$fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		$remember = $request->has('remember') ? true : false;

		if (auth()->attempt([$fieldType => $request->login_id, 'password' => $request->password], $remember))
		{
			return redirect('/');
		}
		return redirect(route('login.show'));
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();
		return redirect(route('login.show'));
	}
}
