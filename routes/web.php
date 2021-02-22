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
Route::resource('software-infos', SoftwareInfoController::class);
Route::get('software-infos/get-sub-offices/{office}', 'SoftwareInfoController@getSubOffices')
    ->name('office.getSubOffice');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
