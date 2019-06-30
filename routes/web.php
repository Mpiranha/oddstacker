<?php

Auth::routes(['verify' => true]);

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
})->name('admin');

Route::get('/admin/users', 'AdminPagesController@users')->name('admin.users');
Route::put('/admin/users/revoke/{id}/{revoke?}', 'AdminPagesController@revoke')->name('user.revoke');

// League
Route::get('/admin/leagues', 'LeagueController@league')->name('admin.league');
Route::get('/admin/leagues/view/{id}', 'LeagueController@sport')->name('league.view');
Route::post( '/admin/leagues/{sport_id}', 'LeagueController@create')->name('league.create');
Route::delete('/admin/leagues/delete/{id}', 'LeagueController@delete')->name('league.delete');

//sport
Route::get('/admin/sports', 'SportsController@sports')->name('admin.sport');
Route::post('/admin/sports', 'SportsController@create')->name('sport.create');
Route::delete('/admin/sports/delete/{id}', 'SportsController@delete')->name('sport.delete');

// Team
Route::get('/admin/teams', 'TeamController@teams')->name('admin.teams');
Route::get('/admin/teams/sport/{id}', 'TeamController@view')->name('team.view');
Route::post('admin/teams/create/{sport_id}', 'TeamController@addNewTeam')->name('team.create');

// Predictions
Route::get('/admin/predictions', 'PredictionController@predictions')->name('admin.prediction');
Route::get( '/admin/predictions/view/{id}', 'PredictionController@view')->name('prediction.view');
Route::post('/admin/predictions/create/{sport_id}', 'PredictionController@create')->name('prediction.create');
Route::delete('/admin/predictions/delete/{id}', 'PredictionController@delete')->name('prediction.delete');
Route::get('/admin/predictions/edit/{id}', 'PredictionController@edit')->name('prediction.edit');
Route::post('/admin/predictions/update/{id}', 'PredictionController@update')->name('prediction.update');

//Event
Route::get('/admin/events', 'EventsController@index')->name('event.index');
Route::get('/admin/events/view', 'EventsController@view')->name('event.view');
Route::get('/admin/events/{country}/view/{id}', 'EventsController@sport')->name('event.sport');
Route::get('/admin/events/{country}/{country_id}/{sport}/view/{id}', 'EventsController@league')->name('event.league');
Route::get('/admin/events/competition/{id}', 'EventsController@createView')->name('event.compt');
Route::get('/admin/events/eventPage/{id}', 'EventsController@viewEventPage')->name('event.page');

// stocks
Route::get('/admin/stocks', 'StockController@index')->name('stock.index');
Route::get('/admin/stocks/category', 'StockController@category')->name('stock.category');
Route::get('/admin/stocks/category/update/{id}', 'StockController@categoryEdit')->name('stock.category.update');
Route::post('/admin/stocks/category/update/{id}', 'StockController@categoryUpdate')->name('stock.category.update');
Route::get('/admin/stocks/type', 'StockController@type')->name('stock.types');
Route::get('/admin/stocks/create-view', 'StockController@createView')->name('stock.create');

// Slider
Route::get('/admin/sliders', 'SliderController@view')->name('admin.sliders');
Route::post('/admin/slider/create', 'SliderController@save')->name('slider.create');
Route::delete('/admin/slider/delete/{id}', 'SliderController@delete')->name('slider.delete');