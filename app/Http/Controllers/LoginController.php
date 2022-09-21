<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
	public function login(LoginRequest $request)
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

	public function logout()
	{
		auth()->logout();
		return redirect('/login');
	}
}
