<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		$fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		if ($fieldType == 'email')
		{
			[
				$fieldType => 'required|min:3',
				'password' => 'required',
			];
		}
		else
		{
			[
				$fieldType => 'required|min:3',
				'password' => 'required',
			];
		}
		if (auth()->attempt([$fieldType => $request->login_id, 'password' => $request->password]))
		{
			return redirect('/');
		}
		return redirect('/login');
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();
		return redirect('/login');
	}
}
