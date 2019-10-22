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

Route::get('/', 'ImageController@index');
Route::post('/imageUpload', 'ImageController@uploadImage')->name('imageUpload');
Route::get('/image/delete/{id}', 'ImageController@deleteImage')->name('image.delete');
Route::get('/image/download/{id}', 'ImageController@downloadImage')->name('image.download');