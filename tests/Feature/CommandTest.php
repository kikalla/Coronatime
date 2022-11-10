<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommandTest extends TestCase
{
	use RefreshDatabase;

	public function test_command_must_get_data_from_api()
	{
		$this->artisan('get:countriesInformation')->assertExitCode(0);
	}
}
