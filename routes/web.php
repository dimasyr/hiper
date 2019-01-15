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
