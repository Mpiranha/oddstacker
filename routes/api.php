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
Route::post('/team/league/add-value', 'TeamController@addLeague');
Route::post('/team/league/delete', 'TeamController@deleteLeague');
Route::delete('/team/delete/{id}', 'TeamController@delete');
Route::get('/teams/{league_id}', 'EventsController@getTeams');
Route::get('/event/event_prediction/get/{event_id}', 'EventsController@eventPrediction');
Route::post( '/event/event_prediction/rate', 'EventsController@rate');
Route::post('/event/create', 'EventsController@createEvent');
Route::post('/event/prediction/add-value', 'EventsController@addPrediction');
Route::post('/event/prediction/delete', 'EventsController@deletePrediction');
Route::delete('/event/delete/{id}', 'EventsController@deleteEvent');
Route::get('/stock/leagues/{sport_id}', 'StockController@league');
Route::get('/stock/events/{sport_id}', 'StockController@events');
Route::post('/stock/save', 'StockController@saveStock');
Route::post('/stock/publish', 'StockController@createStock');
