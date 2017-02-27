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

use App\Section;

Route::get('/', 'ForumController@index');

Route::get('section/{id}/newthread', 'SectionsController@newthread');
Route::resource('section', 'SectionsController');

Route::get('thread/{id}/reply', 'ThreadController@reply');
Route::resource('thread', 'ThreadController', ['only' => [
	'store', 'show'
]]);

Route::resource('post', 'PostController', ['only' => [
	'store', 'show'
]]);

Route::resource('user', 'UserController', ['only' => [
	'show', 'edit', 'update'
]]);

Route::resource('pm', 'PrivateMessageController');

Route::resource('votes', 'VoteController', ['only' => [
	'show', 'store'
]]);

Auth::routes();
