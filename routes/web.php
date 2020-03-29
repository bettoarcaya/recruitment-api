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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::prefix('registration')->group(function() {
    //Route::get('registration', 'RegistrationController@index');
    //Route::post('regis', 'RegistrationController@store');
    //Route::post('regis', 'RegistrationController@testMethod');
    Route::apiResources([
        '/' => 'RegistrationController'
    ]);
});
