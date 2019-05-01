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

Route::get('/forgot-password',function (){
    return view('forgot');
});

Route::get('/enter',function (){
    return redirect(route('home'));
});

/* Route::get('/test',function (){
    return view('test');
}); */

Route::get('/deposit',function (){
    return view('deposit');
});

Route::get('/results',function (){
    return view('results');
});

Route::get('/result',function (){
    return view('result');
});

Route::get('/profile',function (){
    return view('profile');
});

Route::get('/withdrawal',function (){
    return view('withdrawal');
});

Route::get('/cashier',function (){
    return view('cashier');
});

Route::get('/account',function (){
    return view('account');
});

Route::get('/stackshell',function (){
    return view('stackshell');
});

Route::get('/change-password',function (){
    return view('changepwd');
});

Route::post('/change-password/{id}','HomeController@changePassword')->name('change_password');

Route::get('/personal-details',function (){
    return view('personaldetails');
});

Route::get('/stock/{id}/shell', 'HomeController@stackShell')->name('stack_shell');

Route::get('/multiebreak',function (){
    return view('multiebreak');
});

Route::get('/singlebreak',function (){
    return view('singlebreak');
});




Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

/* Admin Routes */

Route::get('/admin', function(){
    return view('admin.dashboard');
});

Route::get('/admin/users', 'AdminPagesController@users')->name('admin.users');

// Countrty
Route::get('/admin/countries', 'CountryController@countries')->name('admin.countries');
Route::post('/admin/countries/create', 'CountryController@create')->name('country.create');
Route::delete('/admin/countries/delete/{id}', 'CountryController@delete')->name('country.delete');

// League
Route::get('/admin/leagues', 'LeagueController@league')->name('admin.league');
Route::get('/admin/leagues/{name}/view/{id}', 'LeagueController@view')->name('league.view');
Route::get('/admin/leagues/{country}/{country_id}/{sport}/view/{id}', 'LeagueController@sport')->name('league.show');
Route::post( '/admin/leagues/{country_id}/{sport_id}', 'LeagueController@create')->name('league.create');
Route::delete('/admin/leagues/delete/{id}', 'LeagueController@delete')->name('league.delete');

//sport
Route::get('/admin/sports', 'SportsController@sports')->name('admin.sport');
Route::post('/admin/sports', 'SportsController@create')->name('sport.create');
Route::delete('/admin/sports/delete/{id}', 'SportsController@delete')->name('sport.delete');

// Team
Route::post('admin/teams/create/{country_id}/{sport_id}/{league_id}', 'TeamController@addNewTeam')->name('team.create');
Route::get('/admin/teams/{name}/view/{id}', 'TeamController@view')->name('team.view');
Route::get('/admin/teams/{country}/{country_id}/{sport}/view/{id}', 'TeamController@league')->name('team.league');
Route::get('/admin/teams/{country}/{country_id}/{sport}/{sport_id}/{league_name}/{league_id}', 'TeamController@getTeams')->name('team.show');
Route::get('/admin/teams', 'TeamController@teams')->name('admin.teams');
Route::delete('/admin/teams/delete/{id}', 'TeamController@delete')->name('team.delete');

// Predictions
Route::get('/admin/predictions', 'PredictionController@predictions')->name('admin.prediction');
Route::get( '/admin/predictions/{name}/view/{id}', 'PredictionController@view')->name('prediction.view');
Route::post('/admin/predictions/create/{sport_name}/{sport_id}', 'PredictionController@create')->name('prediction.create');
Route::delete('/admin/predictions/delete/{id}', 'PredictionController@delete')->name('prediction.delete');
Route::get('/admin/predictions/edit/{id}', 'PredictionController@edit')->name('prediction.edit');
Route::post('/admin/predictions/update/{id}', 'PredictionController@update')->name('prediction.update');

Route::get('/admin/events', function(){
    return view('admin.events');
});

