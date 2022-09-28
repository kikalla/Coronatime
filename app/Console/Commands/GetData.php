<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Country;

class GetData extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'get:data';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'get data from API, API about corona virus statistic';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$countries = json_decode(Http::get('https://devtest.ge/countries'));

		foreach ($countries as $country)
		{
			$response = json_decode(Http::post('https://devtest.ge/get-country-statistics', ['code' => $country->code]));

			Country::create([
				'code'      => $country->code,
				'name'      => json_encode($country->name),
				'confirmed' => $response->confirmed,
				'recovered' => $response->recovered,
				'deaths'    => $response->deaths,
			]);
		}
	}
}
