<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function store(AddUserRequest $request)
	{
		$user = User::create([
			'username'          => $request->username,
			'email'             => $request->email,
			'password'          => bcrypt($request->password),
			'verification_code' => sha1(time()),
		]);

		if ($user != null)
		{
			MailController::sendSingupEmail($user->name, $user->email, $user->verification_code);
		}

		return redirect(route('confirmation'));
	}

	public function verifyUser(Request $request)
	{
		$verification_code = \Illuminate\Support\Facades\Request::get('code');
		$user = User::where(['verification_code' => $verification_code])->first();
		if ($user != null)
		{
			$user->is_verified = 1;
			$user->save();
		}
		return redirect('login');
	}
}
