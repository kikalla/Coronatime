<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

	public function test_register_page_is_accessible()
	{
		$response = $this->get('/register');
		$response->assertSuccessful();
		$response->assertViewIs('register');
	}

	public function test_register_must_give_errors_if_inputs_empty()
	{
		$response = $this->post('/register');
		$response->assertSessionHasErrors([
			'username', 'email', 'password',
		]);
	}

	public function test_register_must_give_errors_if_username_input_is_incorrect()
	{
		$response = $this->post('/register', [
			'username'              => 'gi',
			'email'                 => 'giorgi@gmail.com',
			'password'              => 'giorgi',
			'password_confirmation' => 'giorgi',
		]);
		$response->assertSessionDoesntHaveErrors(['email', 'password', 'password_confirmation']);
		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_register_must_give_errors_if_email_input_is_incorrect()
	{
		$response = $this->post('/register', [
			'username'              => 'giorgi',
			'email'                 => 'giorgigmail.com',
			'password'              => 'giorgi',
			'password_confirmation' => 'giorgi',
		]);
		$response->assertSessionDoesntHaveErrors(['username', 'password', 'password_confirmation']);
		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_register_must_give_errors_if_password_input_is_incorrect()
	{
		$response = $this->post('/register', [
			'username'              => 'giorgi',
			'email'                 => 'giorgi@gmail.com',
			'password'              => 'gi',
			'password_confirmation' => 'gi',
		]);
		$response->assertSessionDoesntHaveErrors(['username', 'email', 'password_confirmation']);
		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_register_must_give_errors_if_password_confirmation_input_is_incorrect()
	{
		$response = $this->post('/register', [
			'username'              => 'giorgi',
			'email'                 => 'giorgi@gmail.com',
			'password'              => 'giorgi',
			'password_confirmation' => 'gio',
		]);
		$response->assertSessionDoesntHaveErrors(['username', 'email']);
		$response->assertSessionHasErrors([
			'password_confirmation', 'password',
		]);
	}

	public function test_register_must_give_errors_if_username_already_used()
	{
		User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
			'is_verified' => 1,
		]);

		$response = $this->post('/register', [
			'username'              => 'giorgi',
			'email'                 => 'giorgi.kikadze@gmail.com',
			'password'              => 'giorgi',
			'password_confirmation' => 'giorgi',
		]);
		$response->assertSessionDoesntHaveErrors(['email', 'password', 'password_confirmation']);
		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_register_must_give_errors_if_email_already_used()
	{
		User::create([
			'username'    => 'gio',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
			'is_verified' => 1,
		]);

		$response = $this->post('/register', [
			'username'              => 'giorgi',
			'email'                 => 'giorgi@gmail.com',
			'password'              => 'giorgi',
			'password_confirmation' => 'giorgi',
		]);
		$response->assertSessionDoesntHaveErrors(['username', 'password', 'password_confirmation']);
		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_register_must_redirect_to_email_message_sent_page()
	{
		$response = $this->post('/register', [
			'username'              => 'giorgi',
			'email'                 => 'giorgi@gmail.com',
			'password'              => 'giorgi',
			'password_confirmation' => 'giorgi',
		]);
		$response->assertSessionDoesntHaveErrors(['username', 'email', 'password', 'password_confirmation']);
		$response->assertRedirect('/confirmation');
	}
}
