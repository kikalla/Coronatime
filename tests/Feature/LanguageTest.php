<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LanguageTest extends TestCase
{
	use RefreshDatabase;

	public function test_language_must_change_after_button_pressed_ka()
	{
		$response = $this->get('/change-locale/ka');
		$response->assertRedirect('/');
	}

	public function test_language_must_change_after_button_pressed_en()
	{
		$response = $this->get('/change-locale/ena');
		$response->assertRedirect('/');
	}
}
