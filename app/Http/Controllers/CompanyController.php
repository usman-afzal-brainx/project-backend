<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function create()
    {
        return view('company.create');
    }
    public function store()
    {
        $company = new Company();

        $file = Storage::put('images', request('logo'));

        $company->name = request('name');
        $company->logo_url = $file;

        $country = new Country();
        $country->name = request('name');
        $country->save();

        $city = new City();
        $city->name = request('name');
        $city->country_id = $country->id;
        $city->save();

        $company->city_id = $city->id;
        $company->save();

        //Storage::get('images/12gpBK4ItZ5SuRQmv3bkY0tkqoaobLWjzjGCH5Yk.jpg');

        //return "Iamges has been stored";

    }
}
