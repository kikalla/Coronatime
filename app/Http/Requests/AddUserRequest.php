<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'username'              => 'required|min:3|unique:users,username',
			'email'                 => 'required|unique:users,email',
			'password'              => 'min:3|confirmed|required|required_with:password_confirmation',
			'password_confirmation' => 'same:password',
		];
	}
}
