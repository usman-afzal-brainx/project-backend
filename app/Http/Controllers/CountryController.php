<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use GuzzleHttp\Psr7\Request;

class CountryController extends Controller
{
    public function getCities()
    {
        $cities = City::select('id', 'name')->where('country_id', request('id'))->get();
        return response()->json([
            'cities' => $cities,
        ]);
    }

    public function getCountry()
    {
        $country = Country::select('id', 'name')->where('id', request('id'))->get();
        return response()->json(['country' => $country]);
    }
}
