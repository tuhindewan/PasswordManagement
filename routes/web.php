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

// Route for office
Route::resource('offices', OfficeController::class);

// Route for sub office
Route::resource('sub-offices', SubOfficeController::class);

// Route for software 
Route::resource('software-infos', SoftwareInfoController::class);

Route::get('software-infos/get-sub-offices/{office}', 
    'SoftwareInfoController@getSubOffices')
    ->name('office.getSubOffice');

Route::get('software-infos/{softwareInfo}/get-sub-offices/{office}', 
            'SoftwareInfoController@getSubOfficesForSoftware');

// Route for employee
Route::resource('employees', EmployeeController::class);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
