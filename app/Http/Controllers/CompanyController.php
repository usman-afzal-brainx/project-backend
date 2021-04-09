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

        $companies = Company::latest()->paginate(5);
        return view('company.index', ['companies' => $companies]);
    }

    public function show(Company $company)
    {
        $employees = $company->employees;
        return view('company.show', ['employees' => $employees]);
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        return view('company.create', ['countries' => $countries, 'cities' => $cities]);
    }

    public function store()
    {
        dd(request()->all());
        request()->validate([
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'no_employees' => ['required', 'integer'],
            'logo' => 'required',
        ]);

        $company = new Company();
        // $path = request()->file('logo')->store('public/images');

        // dd(Storage::url('images/OjUUsXlAjmbbFyagvan0nfqia2bOADvuPJTb4CHe.png'));
        $path = Storage::putFile('public/images', request('logo'), 'public');
        $company->name = request('name');
        $company->no_employees = request('no_employees');
        $company->logo_url = str_replace('public', 'storage', $path);

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

        return redirect("/company");

    }
}
