<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
//Route::get('/welcome',"HomeController@search" );
// Route::post('/events/delete','HomeController@destroy' );
 Route::get('/events/feeds',"HomeController@feed" );
// //Route::get('events',"HomeController@main_page" );
// Route::get('/events/{event_id}', 'EventController@update');
// Route::get('/events', 'EventController@index');
Route::post('/events/update', 'HomeController@update');
Route::post('/events/create', 'HomeController@create');
Route::post('/home/search', 'HomeController@search');
//Route::post('/home/search', 'HomeController@index');

//Route::get('/events/search', 'EventController@index');
//Route::resource('/events', 'EventController');