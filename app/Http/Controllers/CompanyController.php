<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{

    public function index()
    {
        // $user = auth('api')->user();
        // if (!$user) {
        //     return redirect('/');
        // }

        $companies = Company::with(['city' => function ($query) {
            $query->with('country');
        }])->get();

        return response()->json(['companies' => $companies]);
    }

    public function show(Company $company)
    {
        return response()->json(['company' => $company]);

    }

    public function update(Request $request)
    {
        request()->validate([
            'id' => 'required',
            'name' => 'required',
            'city' => 'required | exists:cities,id',
            'country' => 'required | exists:countries,id',
            'no_employees' => 'required | integer',
            'logo' => 'mimes:jpeg,bmp,png',
        ]);
        $company = Company::find($request->id);
        $company->name = $request->name;
        $company->no_employees = $request->no_employees;
        if ($request->logo) {
            $path = Storage::putFile('public/images', $request->logo, 'public');
            $company->logo_url = str_replace('public', 'storage', $path);
        }
        $company->city_id = $request->city;
        $company->save();
        return response()->json(['success' => ['Compnay Updated Successfully'], 'code' => 200], 200);
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
            'logo' => 'mimes:jpeg,bmp,png',
        ]);
        $company = new Company();
        $user = auth('api')->user();
        $company->name = request('name');
        $company->no_employees = request('no_employees');
        if (request('logo')) {
            $path = Storage::putFile('public/images', request('logo'), 'public');
            $company->logo_url = str_replace('public', 'storage', $path);
        }
        $company->city_id = request('city');
        // $company->user_id = $user->id;
        $company->save();
        return response()->json(['success' => ['Company Created Successfully'], 'code' => 200], 200);

    }

    public function delete(Request $request)
    {
        logger($request);
        $company = Company::find($request->id);
        logger($company);
        $company->delete();
        return response()->json(['success' => ['Company deleted Successfully'], 'code' => 200], 200);
    }
}
