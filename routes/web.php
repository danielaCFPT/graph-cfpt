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

Route::get('/', "CommentController@getComment");
Route::get('/test',"CommentController@getComment");
Route::get('/sup/{id}', "CommentController@supComment") -> name('delete');
Route::get('/update/{id}', "CommentController@updateComment") -> name('update');
Route::post('/edit/{id}', "CommentController@editComment") -> name('edit');

Route::post('/upload', 'ImageController@upload');
Route::get('/metaData/{id}', "ImageController@metaDataImage") -> name('metaData');