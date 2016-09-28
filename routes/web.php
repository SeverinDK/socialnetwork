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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/createProfile', 'ProfileController@create');
Route::post('/createProfile', 'ProfileController@post');
Route::get('set_active_profile/{id}', 'ProfileController@setActiveProfile');

Route::post('/createPost', 'PostController@post');

Route::post('/comment/{modelType}/{modelId}', 'CommentController@post');