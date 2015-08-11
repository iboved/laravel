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

Route::get('/', 'QuestionController@index');
Route::get('questions/create', 'QuestionController@create');
Route::get('questions/{slug}', 'QuestionController@show');
Route::get('questions/{slug}/edit', 'QuestionController@edit');
Route::post('questions', 'QuestionController@store');
Route::put('questions/{slug}', 'QuestionController@update');
Route::delete('questions/{slug}', 'QuestionController@delete');
Route::post('questions/{slug}/answer', 'AnswerController@store');
Route::delete('questions/{slug}/answer/{id}', 'AnswerController@delete');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
