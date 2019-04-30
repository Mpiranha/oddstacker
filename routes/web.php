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
Route::post('/admin/leagues', 'LeagueController@create')->name('league.create');
Route::delete('/admin/leagues/delete/{id}', 'LeagueController@delete')->name('league.delete');

//sport
Route::get('/admin/sports', 'SportsController@sports')->name('admin.sport');
Route::post('/admin/sports', 'SportsController@create')->name('sport.create');
Route::delete('/admin/sports/delete/{id}', 'SportsController@delete')->name('sport.delete');

// Team
Route::post('admin/teams/create', 'TeamController@addNewTeam')->name('team.create');
Route::get('/admin/teams', 'TeamController@teams')->name('admin.teams');
Route::delete('/admin/teams/delete/{id}', 'TeamController@delete')->name('team.delete');

Route::get('/admin/events', function(){
    return view('admin.events');
});

