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
Route::group(['namespace' => 'API'], function () {
    Route::get('courses-seed', 'CoursesFactoryController@index');
    Route::get('export-courses', 'CoursesController@export');
    Route::group(['prefix' => 'auth'], function () {
        Route::post('register', 'AuthController@signup');
        Route::post('login', 'AuthController@login');
    });

    Route::group(['middleware' => 'api'], function () {

        // Courses route group
        Route::group(['prefix' => 'courses'], function () {
            Route::get('/', 'CoursesController@index');
            Route::post('add-user-course', 'CoursesController@create');
        });

        // User Details Route group
        Route::group(['prefix' => 'user'], function () {
            Route::post('details', 'AuthController@details');
            Route::post('logout', 'AuthController@logout');
            Route::post('refresh', 'AuthController@refresh');

        });

    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
