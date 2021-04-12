<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('company', 'CompanyController@index')->middleware('verified');

Route::get('user', 'UserController@index')->middleware('verified');

Route::get('employee', 'EmployeeController@index')->middleware('verified');

Route::get('user/edit', 'UserController@edit')->middleware('verified');

Route::post('user/edit', 'UserController@update')->middleware('verified');

Route::get('employee/create', 'EmployeeController@create')->middleware('verified');

Route::get('country/cities', 'CountryController@getCities')->name('countries.cities')->middleware('verified');

Route::post('employee/create', 'EmployeeController@store')->middleware('verified');

Route::get('company/create', 'CompanyController@create')->middleware('verified');

Route::get('company/{company}', 'CompanyController@show')->middleware('verified');

Route::post('company/create', 'CompanyController@store')->middleware('verified');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
