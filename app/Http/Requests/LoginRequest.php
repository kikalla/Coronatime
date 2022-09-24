<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		$fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		if ($fieldType == 'email')
		{
			$this->validate([
				'login_id' => 'required|min:3',
				'password' => 'required',
			], [
				'login_id'                  => 'Email or Username is required',
				'login_id.min'              => 'The Email or Username must be at least 3 characters',
				'login_id.email'            => 'Invalid email adress',
				'logind_id.exists'          => 'Email is not registered',
				'password.required'         => 'Password is required',
			]);
		}
		else
		{
			$this->validate([
				'login_id' => 'required|min:3',
				'password' => 'required',
			], [
				'login_id.min'              => 'The Email or Username must be at least 3 characters',
				'login_id.required'         => 'Email or Username is required',
				'login_id.exists'           => 'Username is not registered',
				'password.required'         => 'Password is required',
			]);
		}
		return [
			'login_id' => 'required|min:3',
			'password' => 'required',
		];
	}
}
