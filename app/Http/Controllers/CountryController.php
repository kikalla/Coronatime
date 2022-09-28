<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Contracts\View\View;

class CountryController extends Controller
{
	public function getSum(): View
	{
		$user = auth()->user()->username;
		$countries = country::all();

		$confirmed = collect($countries)->sum('confirmed');
		$deaths = collect($countries)->sum('deaths');
		$recovered = collect($countries)->sum('recovered');

		return view('home', [
			'user'      => $user,
			'confirmed' => $confirmed,
			'deaths'    => $deaths,
			'recovered' => $recovered,
		]);
	}

	public function postData(): View
	{
		$user = auth()->user()->username;
		$countries = country::all();

		$confirmed = collect($countries)->sum('confirmed');
		$deaths = collect($countries)->sum('deaths');
		$recovered = collect($countries)->sum('recovered');

		if (request('search'))
		{
			$countries = country::where('code', 'like', '%' . request('search') . '%')->sortable()->get();
		}
		else
		{
			$countries = country::sortable()->get();
		}
		return view('countries', [
			'user'      => $user,
			'countries' => $countries,
			'confirmed' => $confirmed,
			'deaths'    => $deaths,
			'recovered' => $recovered,
		]);
	}
}
