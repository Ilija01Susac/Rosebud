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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

//show user data and edit
Route::get('/account/{user_id}', 'AccountController@show')->name('account');
Route::get('/account/{user_id}/edit', 'AccountController@edit')->name('accountEdit');
Route::patch('/account/{user_id}', 'AccountController@update')->name('accountUpdate');
//edit password
Route::get('/account/{user_id}/edit/password', 'AccountController@editPassword')->name('accountEditPassword');
Route::patch('/account/{user_id}/password', 'AccountController@updatePassword')->name('accountUpdatePassword');


//Route::get('/movie', 'MovieController@getMovie');
Route::post('/movie','MovieController@getMovie');
//Route::match(['get','post'], '/movie','MovieController@getMovie');
Route::get('/movie/save', 'MovieController@saveMovie');
Route::get('/watchlist', 'WatchlistController@show')->name('watchlist');

Route::get('/fresh', 'MovieController@getFreshMovies');
