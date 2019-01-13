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
    return view('home');
});

Route::get('/test',function (){
    return view('test');
});

Route::get('/deposit',function (){
    return view('deposit');
});

// Route::get('', function() {
//     return view('login');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Admin Routes */

Route::get('/admin', function(){
    return view('admin.dashboard');
});

Route::get('/admin/users', function(){
    return view('admin.users');
});
Route::get('/admin/countries', function(){
    return view('admin.countries');
});
Route::get('/admin/leagues', function(){
    return view('admin.leagues');
});
Route::get('/admin/events', function(){
    return view('admin.events');
});
Route::get('/admin/teams', function(){
    return view('admin.teams');
});
