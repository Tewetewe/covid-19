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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ProvGraph/filter', 'HomeController@filter');
Route::get('/GlobalGraph/filter', 'HomeController@filterGlobal');

Route::post('/ProvinsiData/import_excel', 'BaliDataController@import_excel_provinsi');
Route::post('/BaliData/import_excel', 'BaliDataController@import_excel_bali');
Route::post('/RekapGlobalData/import_excel', 'BaliDataController@import_excel_rekap_global');
Route::get('/ProvinsiData/export', 'UserController@exportProvinsiData');
Route::get('/RekapGlobalData/export', 'BaliDataController@exportRekapGlobal');
Route::get('/RekapIndo/export', 'BaliDataController@exportRekapIndo');
Route::get('/BaliData/export', 'BaliDataController@exportBaliData');
Route::get('/GlobalData/export', 'UserController@exportGlobalData')->name('globalDataExport');

Route::get('/ProvinsiData', 'UserController@index2')->name('provinsi');
Route::get('/ProvinsiData/filter', 'UserController@filterProvinsi');
Route::get('/GlobalData/filter', 'UserController@filterGlobal');
Route::get('/RekapGlobalData', 'UserController@index3')->name('rekapGlobal');
Route::get('/RekapIndo', 'UserController@rekapIndo')->name('rekapIndo');
Route::get('/GlobalData', 'UserController@globalData')->name('globalData');
Route::get('/loadData', 'UserController@loadData')->name('loadData');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

