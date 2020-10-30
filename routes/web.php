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
    return "Recruitment API :)";
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

Route::group(['prefix' => 'jobs'], function () {
    Route::apiResources([
        '/' => 'JobController'
    ]);
    Route::get('match/{job_id}', 'JobController@match');
    Route::post('search', 'JobController@search');
});

Route::group(['prefix' => 'data'], function () {
    Route::get('search/candidates', 'DataController@searchCandidates');
});
