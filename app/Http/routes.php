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

Route::get('getdata', 'ActionController@getCategory');

Route::group(['prefix' => 'actions'], function(){

    Route::get('','ActionController@index');

    Route::get('add', [
        'as' => 'action-add', 'uses' => 'ActionController@addActionShow'
    ]);

    Route::post('add/submit', [
        'as' => 'action-add-submit', 'uses' => 'ActionController@addAction'
    ]);

    Route::get('edit/{id}', [
        'as' => 'action-edit', 'uses' => 'ActionController@editActionShow'
    ]);

    Route::post('edit/submit', [
        'as' => 'action-edit-submit', 'uses' => 'ActionController@editAction'
    ]);

    Route::get('remove/{id}', [
        'as' => 'action-remove', 'uses' => 'ActionController@removeAction'
    ]);

    Route::get('{id}', [
        'as' => 'action', 'uses' => 'ActionController@detail'
    ]);
});


Route::group(['prefix' => 'documents'], function(){
    Route::get('','DocumentController@index');

    Route::get('add', [
        'as' => 'document-add', 'uses' => 'DocumentController@addDocumentShow'
    ]);

    Route::post('add/submit', [
        'as' => 'document-add-submit', 'uses' => 'DocumentController@addDocument'
    ]);

    Route::get('edit/{id}', [
        'as' => 'document-edit', 'uses' => 'DocumentController@editDocumentShow'
    ]);

    Route::post('edit/submit', [
        'as' => 'document-edit-submit', 'uses' => 'DocumentController@editDocument'
    ]);

    Route::get('remove/{id}', [
        'as' => 'document-remove', 'uses' => 'DocumentController@removeDocument'
    ]);

    Route::get('{id}', [
        'as' => 'document', 'uses' => 'DocumentController@detail'
    ]);
});

/////////////////////////////////////////////////////////////////////

Route::group(['prefix' => 'places'], function(){
    Route::get('','PlaceController@index');

    Route::get('add', [
        'as' => 'place-add', 'uses' => 'PlaceController@addPlaceShow'
    ]);
    Route::post('add/submit', [
        'as' => 'place-add-submit', 'uses' => 'PlaceController@addPlace'
    ]);
    Route::get('edit/{id}', [
        'as' => 'place-edit', 'uses' => 'PlaceController@editPlaceShow'
    ]);

    Route::post('edit/submit', [
        'as' => 'place-edit-submit', 'uses' => 'PlaceController@editPlace'
    ]);

    Route::get('remove/{id}', [
        'as' => 'place-remove', 'uses' => 'PlaceController@removePlace'
    ]);
    Route::get('{id}', [
        'as' => 'place', 'uses' => 'PlaceController@detail'
    ]);
});

Route::group(['prefix' => 'image'], function(){
    Route::get('', [
        'as' => 'image', 'uses' => 'ImageController@index'
    ]);

    Route::post('upload', [
        'as' => 'image-upload', 'uses' => 'ImageController@uploadImage'
    ]);
});

Route::get('queue','QueueController@showQueue');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'api/v1'], function(){

    Route::get('transaction', array(
    			'uses' => 'ServiceController@getAllTransaction'
    ));

    Route::get('transaction/{version}', array(
    			'uses' => 'ServiceController@getTransaction'
    ));

    Route::get('actions/{id}/places', array(
                'uses' => 'ServiceController@getPlaceByAction'
    ));

    Route::post('queue', array(
                 'uses' => 'ServiceController@createQueue'
    ));

    Route::get('queue/noti/{queue_id}', [
        'as' => 'queue-push', 'uses' => 'QueueController@pushNoti'
    ]);

    Route::post('queue/{queue_id}/rate', array(
                 'uses' => 'ServiceController@postRate'
    ));

    Route::get('queue/{reg_id}', array(
                 'uses' => 'ServiceController@getQueue'
    ));

    Route::post('queue/{id}', array(
                 'uses' => 'ServiceController@checkCode'
    ));

    

    


});