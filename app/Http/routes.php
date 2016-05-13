<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// React app routes
Route::get('/', 'HomeController@index');
Route::get('/new', 'HomeController@index');
Route::get('/note/{note_id}', 'HomeController@index');
Route::get('/note/{note_id}/comment', 'HomeController@index');

// Authentication routes
Route::auth();
