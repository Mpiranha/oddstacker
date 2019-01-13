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
