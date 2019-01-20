<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/masuk', [
    'uses' => 'Auth\LoginController@showLoginForm',
    'as' => 'masuk'
]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/dashboard', [
    'uses' => 'PageController@dashboard',
    'as' => 'dashboard'
])->middleware("role:1|2");

//Route Operator
Route::group(['prefix' => 'operator', 'middleware' => 'role:2'], function () {

    Route::get('/cari', [
        'uses' => 'PageController@cariPlatNomor',
        'as' => 'cariPlatNomor'
    ]);

    Route::get('/detail_truck/{plat_nomor}', [
        'uses' => 'PageController@detailTruck',
        'as' => 'detailTruck'
    ]);

    Route::get('/perbaikan', [
        'uses' => 'PageController@perbaikan',
        'as' => 'perbaikan'
    ]);

    Route::get('/perbaikan/{plat_nomor}', [
        'uses' => 'PageController@perbaikiSekarang',
        'as' => 'perbaikiSekarang'
    ]);

});

//Route Owner
Route::group(['prefix' => 'owner', 'middleware' => 'role:1'], function () {

    Route::get('/detail_truck/{plat_nomor}', [
        'uses' => 'PageController@detailTruck',
        'as' => 'detailTruck'
    ]);

    Route::get('/create_kendaraan', [
        'uses' => 'KendaraanController@create',
        'as' => 'create.kendaraan'
    ]);

    Route::post('/store_kendaraan', [
        'uses' => 'KendaraanController@store',
        'as' => 'store.kendaraan'
    ]);

    Route::get('/inputonderdil', [
        'uses' => 'PageController@inputonderdil',
        'as' => 'inputonderdil'
    ]);

    Route::get('/create_user', [
        'uses' => 'UserController@create',
        'as' => 'create.user'
    ]);

    Route::post('/store_user', [
        'uses' => 'UserController@store',
        'as' => 'store.user'
    ]);

});
