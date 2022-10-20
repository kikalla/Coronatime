<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountryTest extends TestCase
{
	use RefreshDatabase;

	public function test_countries_summed_data_is_accssesable()
	{
		$user = User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
			'is_verified' => 1,
		]);
		Country::create([
			'code' => 'GE',
			'name' => [
				'en' => 'Georgia',
				'ka' => 'საქართველო',
			],
			'confirmed' => 10,
			'recovered' => 12,
			'deaths'    => 5,
		]);
		$response = $this->actingAs($user)->get('/');

		$response->assertSee($user->username);
	}

	public function test_countries_are_accssesable()
	{
		$user = User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
			'is_verified' => 1,
		]);
		Country::create([
			'code' => 'GE',
			'name' => [
				'en' => 'Georgia',
				'ka' => 'საქართველო',
			],
			'confirmed' => 10,
			'recovered' => 12,
			'deaths'    => 5,
		]);
		$response = $this->actingAs($user)->get('/countries');

		$response->assertSee($user->username);
	}

	public function test_countries_are_sortable()
	{
		$user = User::create([
			'username'    => 'giorgi',
			'email'       => 'giorgi@gmail.com',
			'password'    => bcrypt('giorgi'),
			'is_verified' => 1,
		]);
		Country::create([
			'code' => 'GE',
			'name' => [
				'en' => 'Georgia',
				'ka' => 'საქართველო',
			],
			'confirmed' => 10,
			'recovered' => 12,
			'deaths'    => 5,
		]);
		$response = $this->actingAs($user)->get('/countries?search=Ge#');

		$response->assertSee('Georgia');
	}
}
