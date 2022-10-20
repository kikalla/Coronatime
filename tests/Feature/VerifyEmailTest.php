<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VerifyEmailTest extends TestCase
{
	use RefreshDatabase;

	public function test_verify_user_if_user_clicks_verify()
	{
		$user = User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
			'is_verified' => 0,
		]);
		$response = $this->get('/verify')->assertRedirect('/login');
	}

	public function test_if_user_is_not_exists_redirect_login_page()
	{
		$response = $this->get('/');
		$response->assertRedirect('/login');
	}

	public function test_if_user_not_verified_redirect_verify_first_page()
	{
		$user = User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
			'is_verified' => 0,
		]);

		$response = $this->actingAs($user)->get('/');
		$response->assertRedirect('/verify-first');
	}
}
