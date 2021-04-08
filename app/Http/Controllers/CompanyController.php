<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::latest()->get();
        return view('company.index', ['companies' => $companies]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store()
    {

        $company = new Company();

        $file = Storage::put('images', request('logo'));

        $company->name = request('name');
        $company->no_employees = request('no_employees');
        $company->logo_url = $file;

        $country = Country::where('name', request('country'))->first();

        if (!$country) {
            $country = new Country();
            $country->name = request('country');
            $country->save();
        }
        $city = City::where('country_id', $country->id)->first();

        if (!$city) {
            $city = new City();
            $city->name = request('city');
            $city->country_id = $country->id;
            $city->save();
        }

        $company->city_id = $city->id;
        $company->save();

        //Storage::get('images/12gpBK4ItZ5SuRQmv3bkY0tkqoaobLWjzjGCH5Yk.jpg');

        return redirect("/company/create");

    }
}
