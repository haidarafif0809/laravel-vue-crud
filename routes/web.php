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

Route::get('/', function () {
	return redirect(url('company'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('company', 'CompanyController',['except' => 'show']);
Route::get('company/show-all','CompanyController@showAll');
Route::get('company/search','CompanyController@search');

