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
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    /*Route::get('/home', function () {
        return view('welcome');
    });*/

    /*Route::get('/', function () {
        return view('welcome');
    });*/
    Route::get('/',[
        'uses'=>'PagesController@dataSiswa',
        'as' => 'home'
    ]);

    Route::match(['get', 'post'],'getDataSiswa','PagesController@getDataSiswa');

    //Route::get('starter','PagesController@starter');
    Route::get('dataSiswa','PagesController@dataSiswa');
    Route::post('dataSiswa','PagesController@addDataSiswa');
    Route::get('grafik','PagesController@grafik');
    Route::post('deleteDataSiswa','PagesController@deleteDataSiswa');
    Route::post('editDataSiswa','PagesController@editDataSiswa');
    Route::post('editDataSiswaPost','PagesController@editDataSiswaPost');
});
