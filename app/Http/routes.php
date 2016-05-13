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

// App routes
Route::get('/', 'HomeController@index');
Route::get('/new', 'HomeController@newNote');
Route::post('/new', 'HomeController@createNote');
Route::get('/note/{note_id}', 'HomeController@viewNote');
Route::get('/note/{note_id}/comment', 'HomeController@newComment');
Route::post('/note/{note_id}/comment', 'HomeController@createComment');

// Authentication routes
Route::auth();
