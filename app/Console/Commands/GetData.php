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
	protected $description = 'get data from API';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$countries = Http::get('https://devtest.ge/countries');
		$data = json_decode($countries);

		$codes = [];
		foreach ($data as $country)
		{
			array_push($codes, $country->code);
		}

		array_map(function ($code, $country) {
			$response = Http::post('https://devtest.ge/get-country-statistics', ['code' => $code]);
			$decode = json_decode($response);

			Country::create([
				'code'      => $country->code,
				'name'      => json_encode($country->name),
				'confirmed' => $decode->confirmed,
				'recovered' => $decode->recovered,
				'deaths'    => $decode->deaths,
			]);
		}, $codes, $data);
	}
}
