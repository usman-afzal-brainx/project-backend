<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{

    public function index()
    {

        $companies = Company::latest()->paginate(1);
        return view('company.index', ['companies' => $companies]);
    }

    public function show(Company $company)
    {
        $employees = $company->employees;
        return view('company.show', ['employees' => $employees]);
    }

    public function edit(Company $company)
    {
        $countries = $countries = Country::all();
        return view('company.edit', ['company' => $company, 'countries' => $countries]);
    }

    public function update(Company $company)
    {
        request()->validate([
            'name' => 'required',
            'city' => 'required | exists:cities,id',
            'country' => 'required | exists:countries,id',
            'no_employees' => ['required', 'integer'],
            'logo' => 'mimes:jpeg,bmp,png',
        ]);
        $company->name = request('name');
        $company->no_employees = request('no_employees');
        if (request('logo')) {
            $path = Storage::putFile('public/images', request('logo'), 'public');
            $company->logo_url = str_replace('public', 'storage', $path);
        }
        $company->city_id = request('city');
        $company->save();
        return redirect()->route('company');
    }

    public function create()
    {
        $countries = Country::all();
        return view('company.create', ['countries' => $countries]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'city' => 'required | exists:cities,id',
            'country' => 'required | exists:countries,id',
            'no_employees' => ['required', 'integer'],
            'logo' => 'required | mimes:jpeg,bmp,png',
        ]);

        $company = new Company();

        $path = Storage::putFile('public/images', request('logo'), 'public');
        $company->name = request('name');
        $company->no_employees = request('no_employees');
        $company->logo_url = str_replace('public', 'storage', $path);
        $company->city_id = request('city');
        $company->save();

        return redirect("/company");

    }

    public function delete(Company $company)
    {
        $company->delete();
        return redirect()->route('company');
    }
}
