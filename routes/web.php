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

//Route Operator
Route::group(['prefix' => 'operator', 'middleware' => 'role:1|2'], function () {

    Route::get('/perbaikan', [
        'uses' => 'PageController@perbaikan',
        'as' => 'perbaikan'
    ]);

    Route::get('/perbaikan/{plat_nomor}', [
        'uses' => 'PageController@perbaikiSekarang',
        'as' => 'perbaiki.sekarang'
    ]);

    Route::post('/proses_perbaikan', [
        'uses' => 'PageController@prosesPerbaikan',
        'as' => 'proses.perbaikan'
    ]);

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

    Route::post('/ganti_password/{id}', [
        'uses' => 'UserController@gantiPassword',
        'as' => 'ganti.password'
    ]);

    Route::post('/ganti_role/{id}', [
        'uses' => 'UserController@gantiRole',
        'as' => 'ganti.role'
    ]);

    Route::resources([
        'user' => 'UserController',
        'kendaraan' => 'KendaraanController',
        'onderdil' => 'OnderdilController',
        'alatberat' => 'AlatBeratController',
        'onderdilkendaraan' => 'OnderdilKendaraanController',
        'permintaan' => 'PermintaanController'
    ]);

});

