<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;

class CountryController extends Controller
{
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
		if (request('search'))
		{
			$countries = $country->where('code', 'like', '%' . request('search') . '%')->sortable()->get();
		}
		else
		{
			$countries = $country->sortable()->get();
		}
		return view('countries', [
			'user'      => $user->where('id', auth()->id())->first(),
			'countries' => $countries,
			'confirmed' => $confirmed,
			'deaths'    => $deaths,
			'recovered' => $recovered,
		]);
	}
}
