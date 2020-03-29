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

//base route.
Route::get('/', function () {
    return view('welcome');
});

// test way, will be change in the future. or not...
Route::prefix('registration')->group(function() {
    Route::apiResources([
        '/' => 'RegistrationController'
    ]);
});

//better way to handled routes middleware. I guess....
Route::group(['prefix' => 'categories'], function () {
    Route::apiResources([
        '/' => 'WorkCategoryController'
    ]);
});
