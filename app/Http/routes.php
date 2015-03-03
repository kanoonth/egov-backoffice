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

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::get('actions','ActionController@index');

Route::get('actions/add', [
    'as' => 'action-add', 'uses' => 'ActionController@addActionShow'
]);

Route::post('actions/add/submit', [
    'as' => 'action-add-submit', 'uses' => 'ActionController@addAction'
]);

Route::get('actions/edit/{id}', [
    'as' => 'action-edit', 'uses' => 'ActionController@editActionShow'
]);

Route::post('actions/edit/submit', [
    'as' => 'action-edit-submit', 'uses' => 'ActionController@editAction'
]);

Route::get('actions/remove/{id}', [
    'as' => 'action-remove', 'uses' => 'ActionController@removeAction'
]);

Route::get('actions/{id}', [
    'as' => 'action', 'uses' => 'ActionController@detail'
]);

Route::get('documents','DocumentController@index');

Route::get('documents/add', [
    'as' => 'document-add', 'uses' => 'DocumentController@addDocumentShow'
]);

Route::post('documents/add/submit', [
    'as' => 'document-add-submit', 'uses' => 'DocumentController@addDocument'
]);

Route::get('documents/edit/{id}', [
    'as' => 'document-edit', 'uses' => 'DocumentController@editDocumentShow'
]);

Route::post('documents/edit/submit', [
    'as' => 'document-edit-submit', 'uses' => 'DocumentController@editDocument'
]);

Route::get('documents/remove/{id}', [
    'as' => 'document-remove', 'uses' => 'DocumentController@removeDocument'
]);

Route::get('documents/{id}', [
    'as' => 'document', 'uses' => 'DocumentController@detail'
]);

/////////////////////////////////////////////////////////////////////

Route::get('places','PlaceController@index');
Route::get('places/add', [
    'as' => 'place-add', 'uses' => 'PlaceController@addPlaceShow'
]);
Route::post('places/add/submit', [
    'as' => 'place-add-submit', 'uses' => 'PlaceController@addPlace'
]);


Route::get('image', [
    'as' => 'image', 'uses' => 'ImageController@index'
]);

Route::post('image/upload', [
    'as' => 'image-upload', 'uses' => 'ImageController@uploadImage'
]);

Route::get('map','MapController@index');

Route::get('queue','QueueController@showQueue');

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