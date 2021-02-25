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

// Get sub office list by office in Software Inforamtion create page
Route::get('software-infos/get-sub-offices/{office}', 
    'SoftwareInfoController@getSubOffices')
    ->name('office.getSubOffice');


// Get sub office list by office in Software Inforamtion edit page
Route::get('software-infos/{softwareInfo}/get-sub-offices/{office}', 
            'SoftwareInfoController@getSubOfficesForSoftware');

// Route for employee
Route::resource('employees', EmployeeController::class);

// Get sub office list by office in Employee create page
Route::get('employees/get-sub-office/{office}', 
        'SoftwareInfoController@getSubOffices');

// Get sub office list by office in Employee edit page
Route::get('employees/{employee}/get-sub-office/{office}', 
        'SoftwareInfoController@getSubOfficesForEmployee');

// Get software list by office in Employee create page
Route::get('employees/get-software-information/{subOffice}', 
        'SoftwareInfoController@getSoftwareList');

// Get software list by office in Employee Edit page
Route::get('employees/{employee}/get-software-information/{subOffice}',
        'SoftwareInfoController@getSoftwareListForEmployee');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
