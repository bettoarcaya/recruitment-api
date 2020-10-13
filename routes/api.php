<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'Api\AuthController@login');
Route::post('/logout', 'Api\AuthController@logout');

Route::middleware('auth:api')->group(function (){

    Route::group(['prefix' => 'registration'], function() {
        Route::apiResources([
            '/' => 'RegistrationController'
        ]);
    });

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
        Route::post('search', 'JobController@searchCandidates');
    });
});
