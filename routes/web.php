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

// Route for Office
Route::resource('offices', OfficeController::class);
Route::resource('sub-offices', SubOfficeController::class);
Route::get('sub-offices/{subOffice}/software/create', 'SoftwareInfoController@create')
        ->name('subOffice.softwareAdd');
Route::resource('software-infos', SoftwareInfoController::class);
