<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Password;

class UpdatePasswordTest extends TestCase
{
	use RefreshDatabase;

	public function test_update_password_page_is_accessible()
	{
		$response = $this->get('/reset-password/{token}');
		$response->assertSuccessful();
		$response->assertViewIs('update-password');
	}

	public function test_update_password_must_give_errors_if_inputs_empty()
	{
		$response = $this->post('/reset-password/{token}');
		$response->assertSessionHasErrors(['password']);
	}

	public function test_update_password_must_give_errors_if_passwords_dose_not_match()
	{
		$response = $this->post('/reset-password/{token}', [
			'password'              => 'giorgi',
			'password_confirmation' => 'gio',
		]);
		$response->assertSessionHasErrors(['password', 'password_confirmation']);
	}

	public function test_update_must_redirect_to_login_page()
	{
		$user = User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
		]);

		$this->post('/forgot-password', [
			'email' => 'giorgi@gmail.com',
		]);

		$token = Password::createToken($user);

		$response = $this->post('/reset-password' . '/' . $token, [
			'email'                 => $user->email,
			'password'              => 'giorgi',
			'password_confirmation' => 'giorgi',
			'token'                 => $token,
		]);

		$response->assertRedirect('/login');
	}
}
