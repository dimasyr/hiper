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

Route::group(['middleware' => 'role:1|2'], function(){

    Route::get('/dashboard', [
        'uses' => 'PageController@dashboard',
        'as' => 'dashboard'
    ]);

    Route::get('/detail_truck/{plat_nomor}', [
        'uses' => 'PageController@detailTruck',
        'as' => 'detailTruck'
    ]);

    Route::get('/info_riwayat/{id}', [
        'uses' => 'PageController@infoRiwayat',
        'as' => 'info.riwayat'
    ]);
});


//Route Operator
Route::group(['prefix' => 'operator', 'middleware' => 'role:2'], function () {

    Route::get('/cari', [
        'uses' => 'PageController@cariPlatNomor',
        'as' => 'cariPlatNomor'
    ]);

    Route::get('/perbaikan', [
        'uses' => 'PageController@perbaikan',
        'as' => 'perbaikan'
    ]);

    Route::get('/perbaikan/{plat_nomor}', [
        'uses' => 'PageController@perbaikiSekarang',
        'as' => 'perbaikiSekarang'
    ]);

    Route::post('/proses_perbaikan', [
        'uses' => 'PageController@prosesPerbaikan',
        'as' => 'proses.perbaikan'
    ]);

//    Route::resources([
//        'perbaikan' => 'PermintaanController',
//    ]);
});

//Route Owner
Route::group(['prefix' => 'owner', 'middleware' => 'role:1'], function () {

    Route::get('/inputonderdil', [
        'uses' => 'PageController@inputonderdil',
        'as' => 'inputonderdil'
    ]);

    Route::resources([
        'user' => 'UserController',
        'kendaraan' => 'KendaraanController',
        'onderdil' => 'OnderdilController',
        'alatberat' => 'AlatBeratController'
    ]);

});
