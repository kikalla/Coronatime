<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
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

	public function getSum(User $user, Country $country)
	{
		$countries = $country->all();

		$confirmed = 0;
		$deaths = 0;
		$recovered = 0;

		foreach ($countries as $country)
		{
			$confirmed += $country->confirmed;
			$deaths += $country->deaths;
			$recovered += $country->recovered;
		}

		return view('home', [
			'user'      => $user->where('id', auth()->id())->first(),
			'confirmed' => $confirmed,
			'deaths'    => $deaths,
			'recovered' => $recovered,
		]);
	}

	public function postData(User $user, Country $country)
	{
		$countries = $country->all();
		$confirmed = 0;
		$deaths = 0;
		$recovered = 0;

		foreach ($countries as $country)
		{
			$confirmed += $country->confirmed;
			$deaths += $country->deaths;
			$recovered += $country->recovered;
		}
		$countries = Country::sortable()->paginate(count($country->all()));
		return view('countries', [
			'user'      => $user->where('id', auth()->id())->first(),
			'countries' => $countries,
			'confirmed' => $confirmed,
			'deaths'    => $deaths,
			'recovered' => $recovered,
		]);
	}
}
