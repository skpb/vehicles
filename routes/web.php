<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Vehicles
Route::group([
        'prefix' => 'vehiculos',
        'middleware' => 'auth',
    ],
    function () {
        Route::get('/', 'VehicleController@index')->name('vehicles.index');
        Route::get('/cargar', 'VehicleController@uploadFile')->name('vehicles.upload');
        Route::post('/', 'VehicleController@import')->name('vehicles.import');
    }
);


