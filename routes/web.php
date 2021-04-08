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

Route::get('company', 'CompanyController@index');

Route::get('employee/create', 'EmployeeController@create');

Route::post('employee/create', 'EmployeeController@store');

Route::get('company/create', 'CompanyController@create');

Route::post('company/create', 'CompanyController@store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
