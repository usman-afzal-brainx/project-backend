<?php

namespace App\Http\Controllers;

use App\Models\City;
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
}
