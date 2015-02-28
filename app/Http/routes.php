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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('actions','ActionController@index');

Route::get('action/{id}', [
    'as' => 'action', 'uses' => 'ActionController@detail'
]);

Route::get('map','MapController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('api/v1/action/{id}', array(
			'as' => 'action.show',
			'uses' => 'ActionServiceController@show'
));

Route::get('api/v1/transaction', array(
			'uses' => 'ServiceController@getAllTransaction'
));

Route::get('api/v1/transaction/{version}', array(
			'uses' => 'ServiceController@getTransaction'
));