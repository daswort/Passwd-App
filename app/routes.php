<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/info', function()
{
	phpinfo();
});

Route::get('/pass', function() {
	echo Hash::make('123456');
});

Route::group(array('before'=>'logged'), function() 
{
	Route::get('/user/login', 'UserController@getLogin');
	Route::post('/user/login', 'UserController@postLogin');

	Route::get('/user/register', 'UserController@getRegister');
	Route::post('/user/register', 'UserController@postRegister');

	Route::get('/user/recover', 'UserController@getRecover');
	Route::post('/user/recover', 'UserController@postRecover');

	Route::get('/user/password-reset/{token}', array(
  		'uses'=>'UserController@getReset',
  		'as'=>'password.reset'
	));
	Route::post('/user/password-reset/{token}', array(
  		'uses'=>'UserController@postReset',
  		'as'=>'password.update'
	));
});

Route::group(array('before'=>'auth'), function() 
{
	Route::get('/', 'HomeController@getIndex');
	Route::get('/user', 'UserController@getUsers');
	Route::get('/user/logout', 'UserController@logout');
});
