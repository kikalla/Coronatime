<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Models\User;

class UserController extends Controller
{
	public function store(AddUserRequest $request)
	{
		User::create([
			'username' => $request->username,
			'email'    => $request->email,
			'password' => bcrypt($request->password),
		]);
		return redirect('/');
	}
}
