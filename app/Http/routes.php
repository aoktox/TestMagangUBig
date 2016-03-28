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
    Route::get('getJumlahSiswa','PagesController@getJumlahSiswa');

    Route::get('getTglLahirSiswa','PagesController@getTglLahirSiswa');

    Route::get('api', function(){
        $stats = DB::table('siswa')
            ->groupBy('created_at')
            ->orderBy('created_at', 'ASC')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as value')
            ]);

        return $stats;
    });
});
