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

//Event
Route::get('/teams/{country_id}/{league_id}', 'EventsController@getTeams');
Route::post('/event/create', 'EventsController@createEvent');
Route::post( '/event/prediction/add-value', 'EventsController@addPrediction');
Route::post( '/event/prediction/delete', 'EventsController@deletePrediction');
Route::delete( '/event/delete/{id}', 'EventsController@deleteEvent');
