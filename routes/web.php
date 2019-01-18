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

Route::get('/dashboard', [
    'uses' => 'PageController@dashboard',
    'as' => 'dashboard'
]);

Route::get('/cari', [
    'uses' => 'PageController@cariPlatNomor',
    'as' => 'cariPlatNomor'
]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/masuk', [
    'uses' => 'PageController@masuk',
    'as' => 'masuk'
]);

Route::get('/detail_truck/{plat_nomor}', [
    'uses' => 'PageController@detailTruck',
    'as' => 'detailTruck'
]);

Route::get('/perbaikan', [
    'uses' => 'PageController@perbaikan',
    'as' => 'perbaikan'
]);

Route::get('/inputkendaraan', [
    'uses' => 'PageController@inputkendaraan',
    'as' => 'inputkendaraan'
]);

Route::get('/inputonderdil', [
    'uses' => 'PageController@inputonderdil',
    'as' => 'inputonderdil'
]);