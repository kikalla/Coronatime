<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
	public function getData()
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
