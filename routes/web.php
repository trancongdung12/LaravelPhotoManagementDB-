<?php

use Illuminate\Support\Facades\Route;

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

//Category
Route::get('admin/category','Admin\CategoryController@index');
Route::get('admin/category/create','Admin\CategoryController@create');
Route::post('admin/category','Admin\CategoryController@store');
Route::get('admin/category/{id}/edit','Admin\CategoryController@edit');
Route::patch('admin/category','Admin\CategoryController@update');
Route::delete('admin/category/{id}','Admin\CategoryController@destroy');
//Photo
Route::get('admin/photo','Admin\PhotoController@index');
Route::get('admin/photo/create','Admin\PhotoController@create');
Route::post('admin/photo','Admin\PhotoController@store');
Route::get('admin/photo/{id}/edit','Admin\PhotoController@edit');
Route::patch('admin/photo/','Admin\PhotoController@update');
Route::delete('admin/photo/{id}','Admin\PhotoController@destroy');
//Tag
Route::get('admin/tag','Admin\TagController@index');
Route::get('admin/tag/create','Admin\TagController@create');
Route::post('admin/tag','Admin\TagController@store');
Route::get('admin/tag/{id}/edit','Admin\TagController@edit');
Route::patch('admin/tag','Admin\TagController@update');
Route::delete('admin/tag/{id}','Admin\TagController@destroy');
