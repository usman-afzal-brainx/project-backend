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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('user', 'UserController@index')->name('user')->middleware('auth');
Route::get('user/edit', 'UserController@edit')->name('user.edit')->middleware('auth');
Route::put('user/store', 'UserController@update')->name('user.store')->middleware('auth');

Route::get('company', 'CompanyController@index')->name('company')->middleware('auth');
Route::get('company/create', 'CompanyController@create')->name('company.create')->middleware('auth');
Route::get('company/{company}', 'CompanyController@show')->name('company.show')->middleware('auth');
Route::get('company/{company}/edit', 'CompanyController@edit')->name('company.edit')->middleware('auth');
Route::put('company/{company}/update', 'CompanyController@update')->name('company.update')->middleware('auth');
Route::get('company/{company}/delete', 'CompanyController@delete')->name('company.delete')->middleware('auth');
Route::post('company/store', 'CompanyController@store')->name('company.store')->middleware('auth');

Route::get('employee', 'EmployeeController@index')->name('employee')->middleware('auth');
Route::get('employee/create', 'EmployeeController@create')->name('employee.create')->middleware('auth');
Route::post('employee/store', 'EmployeeController@store')->name('employee.store')->middleware('auth');
Route::get('employee/{employee}/edit', 'EmployeeController@edit')->name('employee.edit')->middleware('auth');
Route::put('employee/{employee}/update', 'EmployeeController@update')->name('employee.update')->middleware('auth');
Route::get('employee/{employee}/delete', 'EmployeeController@delete')->name('employee.delete')->middleware('auth');

Route::get('country/cities', 'CountryController@getCities')->name('countries.cities')->middleware('auth');
