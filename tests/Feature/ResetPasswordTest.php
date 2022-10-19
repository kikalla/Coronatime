<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
	use RefreshDatabase;

	public function test_reset_password_page_is_accessible()
	{
		$response = $this->get('/forgot-password');
		$response->assertSuccessful();
		$response->assertViewIs('forgot-password');
	}

	public function test_reset_password_must_give_error_if_input_is_empty()
	{
		$response = $this->post('/forgot-password');
		$response->assertSessionHasErrors(['email']);
	}

	public function test_reset_password_must_give_error_if_email_does_not_exists()
	{
		User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
		]);

		$response = $this->post('/forgot-password', [
			'email' => 'gio@gmail.com',
		]);
		$response->assertSessionHasErrors(['email']);
	}

	public function test_reset_password_must_give_error_if_email_is_not_correct()
	{
		User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
		]);

		$response = $this->post('/forgot-password', [
			'email' => 'giogmail.com',
		]);
		$response->assertSessionHasErrors(['email']);
	}

	public function test_reset_password_redirects_to_email_send_message()
	{
		User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
		]);

		$response = $this->post('/forgot-password', [
			'email' => 'giorgi@gmail.com',
		]);
		$response->assertRedirect('/reset-send');
	}
}
