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
Route::prefix('v1')->group(function() {
    Route::get('epochs/current', 'EpochController@current');
    Route::get('epochs/{id}', 'EpochController@show');
    Route::get('epochs/', 'EpochController@index');
    Route::get('days/{id}', 'DayController@show');
    Route::get('days/', 'DayController@index');
    Route::get('days/epoch/{id}', 'DayController@epoch');
});
