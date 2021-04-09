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

Route::get('company', 'CompanyController@index')->middleware('auth');

Route::get('user', 'UserController@index')->middleware('auth');

Route::get('employee', 'EmployeeController@index')->middleware('auth');

Route::get('user/edit', 'UserController@edit')->middleware('auth');

Route::post('user/edit', 'UserController@update')->middleware('auth');

Route::get('employee/create', 'EmployeeController@create')->middleware('auth');

Route::post('employee/create', 'EmployeeController@store')->middleware('auth');

Route::get('company/create', 'CompanyController@create')->middleware('auth');

Route::get('company/{company}', 'CompanyController@show')->middleware('auth');

Route::post('company/create', 'CompanyController@store')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
