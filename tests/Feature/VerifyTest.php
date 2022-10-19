<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VerifyTest extends TestCase
{
	use RefreshDatabase;

	public function test_example()
	{
		$response = $this->get('/');

		$response->assertStatus(200);
	}
}
