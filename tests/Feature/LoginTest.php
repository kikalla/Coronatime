<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
	use RefreshDatabase;

	public function test_login_page_is_accessible()
	{
		$response = $this->get('/login');
		$response->assertSuccessful();
		$response->assertViewIs('login');
	}

	public function test_login_must_give_errors_if_inputs_empty()
	{
		$response = $this->post('/login');
		$response->assertSessionHasErrors(['login_id', 'password']);
	}

	public function test_login_must_give_errors_if_email_or_username_field_is_incorrect()
	{
		$response = $this->post('/login', [
			'login_id' => 'gi',
			'password' => 'giorgi',
		]);
		$response->assertSessionDoesntHaveErrors(['password']);
		$response->assertSessionHasErrors(['login_id']);
	}

	public function test_login_must_give_errors_if_password_input_is_incorrect()
	{
		User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
		]);

		$response = $this->post('/login', [
			'login_id' => 'giorgi',
			'password' => '',
		]);
		$response->assertSessionDoesntHaveErrors(['login_id']);
		$response->assertSessionHasErrors(['password']);
	}

	public function test_login_must_give_errors_if_user_does_not_exists_with_username()
	{
		User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
		]);

		$response = $this->post('/login', [
			'login_id' => 'gio',
			'password' => 'giorgi',
		]);
		$response->assertSessionDoesntHaveErrors(['password']);

		$response->assertSessionHasErrors(['login_id']);
	}

	public function test_login_must_give_errors_if_user_does_not_exists_with_email()
	{
		User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
		]);

		$response = $this->post('/login', [
			'login_id' => 'gio@gmail.com',
			'password' => 'giorgi',
		]);
		$response->assertSessionDoesntHaveErrors(['password']);

		$response->assertSessionHasErrors(['login_id']);
	}

	public function test_login_must_redirect_to_stat_URL()
	{
		User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
		]);

		$response = $this->post('/login', [
			'login_id' => 'giorgi',
			'password' => 'giorgi',
		]);

		$response->assertRedirect('/');
	}

	public function test_login_must_redirect_to_login_if_user_password_is_incorrect()
	{
		User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
		]);

		$response = $this->post('/login', [
			'login_id' => 'giorgi',
			'password' => 'gio',
		]);

		$response->assertRedirect('/login');
	}

	public function test_can_logout_clicking_logout_button()
	{
		$user = User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
		]);
		$this->be($user);
		$this->post('/logout')->assertRedirect('login');
	}
}
