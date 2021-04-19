<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/company', 'CompanyController@index');
Route::get('/company/{company}', 'CompanyController@show');
Route::post('/company/store', 'CompanyController@store');

Route::get('/employee', 'EmployeeController@index');
Route::get('/employee/create', 'EmployeeController@create');
Route::post('/employee/store', 'EmployeeController@store');

Route::get('/country', 'CountryController@getCountries');
Route::get('/country/cities', 'CountryController@getCities');
