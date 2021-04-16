<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{

    public function index()
    {
        $user = auth('api')->user();
        if (!$user) {
            return redirect('/');
        }

        //$companies = Company::where('user_id', $user->id)->with(['city.country'])->get();
        $companies = Company::where('user_id', $user->id)->with(['city' => function ($query) {
            $query->with('country');
        }])->get();

        // $companies = Company::latest()->paginate(1);
        return response()->json(['companies' => $companies]);
        //return view('company.index', ['companies' => $companies]);
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
        $user = Auth::user();
        $path = Storage::putFile('public/images', request('logo'), 'public');
        $company->name = request('name');
        $company->no_employees = request('no_employees');
        $company->logo_url = str_replace('public', 'storage', $path);
        $company->city_id = request('city');
        $company->user_id = $user->id;
        $company->save();

        return redirect("/company");

    }

    public function delete(Company $company)
    {
        $company->delete();
        return redirect()->route('company');
    }
}
