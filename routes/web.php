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
    return redirect('/feed');
});

Auth::routes();

Route::get('/feed', 'HomeController@feed');
Route::get('/subscribes', 'HomeController@subscribes');

Route::get('/communities', 'HomeController@communities');

Route::get('/profile', 'ProfileController@profile');
Route::get('/profile/{id}', 'ProfileController@profile');
Route::get('/friends/{id}', 'ProfileController@friends');
Route::get('/communities/{id}', 'ProfileController@communities');
Route::get('/about/{id}', 'ProfileController@about');
Route::post('/feed', 'HomeController@feed');

