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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', 'UserController');
Route::get('/', 'CrudController@index');
Route::get('/add', 'CrudController@create');
Route::post('/store', 'CrudController@store');
Route::get('/read/{id}', 'CrudController@show');
Route::get('/edit/{id}', 'CrudController@edit');
Route::post('/update/{id}', 'CrudController@update');
Route::get('/delete/{id}', 'CrudController@destroy');
Route::get('/print/{id}', 'CrudController@cetak');


Route::get('query', 'CariController@search');
Route::get('/option','CariController@index');
Route::get('select','CariController@filter');
Route::auth();

Route::get('/home', 'HomeController@index');

$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\AuthController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\AuthController@getSocialHandle']);



