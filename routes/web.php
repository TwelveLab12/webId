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

Route::get('/', 'WishfilesController@create')->name('wishfiles.create');
Route::get('/list', 'WishfilesController@index')->name('wishfiles.list');
Route::post('/', 'WishfilesController@store')->name('wishfiles.store');
Route::get('/file', 'WishfilesController@show')->name('wishfiles.show');

//
// Route::resource('/', 'WishfilesController')->only(['create'])->;
// Route::resource('wishfiles', 'WishfilesController')->only(['store']);
