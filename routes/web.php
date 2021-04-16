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

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('user', 'UserController@index')->name('user');
    Route::get('user/edit', 'UserController@edit')->name('user.edit');
    Route::put('user/store', 'UserController@update')->name('user.store');

    Route::get('company', 'CompanyController@index')->name('company');
    Route::get('company/create', 'CompanyController@create')->name('company.create');
    Route::get('company/{company}', 'CompanyController@show')->name('company.show');
    Route::get('company/{company}/edit', 'CompanyController@edit')->name('company.edit');
    Route::put('company/{company}/update', 'CompanyController@update')->name('company.update');
    Route::get('company/{company}/delete', 'CompanyController@delete')->name('company.delete');
    Route::post('company/store', 'CompanyController@store')->name('company.store')->middleware('auth');

    Route::get('employee', 'EmployeeController@index')->name('employee');
    Route::get('employee/create', 'EmployeeController@create')->name('employee.create');
    Route::post('employee/store', 'EmployeeController@store')->name('employee.store');
    Route::get('employee/{employee}/edit', 'EmployeeController@edit')->name('employee.edit');
    Route::put('employee/{employee}/update', 'EmployeeController@update')->name('employee.update');
    Route::get('employee/{employee}/delete', 'EmployeeController@delete')->name('employee.delete');

    Route::get('country/cities', 'CountryController@getCities')->name('countries.cities');
});
