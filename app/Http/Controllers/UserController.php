<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;

class UserController extends Controller
{
	public function store(AddUserRequest $request): RedirectResponse
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

		return redirect(route('confirmation.show'));
	}

	public function verifyUser(): RedirectResponse
	{
		$user = User::where(['verification_code' => Request::get('code')])->first();
		if ($user != null)
		{
			$user->is_verified = 1;
			$user->save();
		}
		return redirect(route('login.show'));
	}

	public function forgotPassword(ResetPasswordRequest $request)
	{
		$status = Password::sendResetLink(
			$request->only('email')
		);

		return $status === Password::RESET_LINK_SENT
			? redirect(route('reset-send.show'))->with(['status' => __($status)])
			: back()->withErrors(['email' => __($status)]);
	}

	public function resetPassword($token)
	{
		return view('update-password', ['token' => $token]);
	}

	public function updatePassword(UpdatePasswordRequest $request)
	{
		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function ($user, $password) {
				$user->forceFill([
					'password' => Hash::make($password),
				])->setRememberToken(Str::random(60));

				$user->save();

				event(new PasswordReset($user));
			}
		);

		return $status === Password::PASSWORD_RESET
			? redirect()->route('login')->with('status', __($status))
			: back()->withErrors(['email' => [__($status)]]);
	}
}
