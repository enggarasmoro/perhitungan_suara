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

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/kecamatan', 'KecamatanController@index')->name('kecamatan')->middleware('auth');
Route::get('/kecamatan/getdata', 'KecamatanController@getKecamatan')->name('getkecamatan')->middleware('auth');
Route::post('/kecamatan/create', 'KecamatanController@create')->name('createKecamatan')->middleware('auth');
Route::post('/kecamatan/edit', 'KecamatanController@edit')->name('editKecamatan')->middleware('auth');
Route::post('/kecamatan/destroy', 'KecamatanController@destroy')->name('deleteKecamatan')->middleware('auth');
Route::get('/desa', 'DesaController@index')->name('desa')->middleware('auth');
Route::get('/desa/getdata', 'DesaController@getDesa')->name('getdesa')->middleware('auth');
Route::post('/desa/create', 'DesaController@create')->name('createDesa')->middleware('auth');
Route::post('/desa/edit', 'DesaController@edit')->name('editDesa')->middleware('auth');
Route::post('/desa/destroy', 'DesaController@destroy')->name('deleteDesa')->middleware('auth');
Route::get('/perhitunganjember', 'PerhitunganjemberController@index')->name('perhitunganjember')->middleware('auth');
Route::get('/perhitunganjember/getdata', 'PerhitunganjemberController@getPerhitunganjember')->name('getperhitunganjember')->middleware('auth');
Route::post('/perhitunganjember/create', 'PerhitunganjemberController@create')->name('createPerhitunganjember')->middleware('auth');
Route::post('/perhitunganjember/edit', 'PerhitunganjemberController@edit')->name('editPerhitunganjember')->middleware('auth');
Route::post('/perhitunganjember/destroy', 'PerhitunganjemberController@destroy')->name('deletePerhitunganjember')->middleware('auth');
Route::get('/perhitungan', 'PerhitunganController@index')->name('perhitungan')->middleware('auth');
Route::get('/perhitungan/getdata', 'PerhitunganController@getPerhitungan')->name('getperhitungan')->middleware('auth');
Route::post('/perhitungan/updateSuara', 'PerhitunganController@updateSuara')->name('updateSuara')->middleware('auth');
Route::get('/user', 'UserController@index')->name('user')->middleware('auth');
Route::get('/user/getdata', 'UserController@getUser')->name('getuser')->middleware('auth');
Route::post('/user/create', 'UserController@create')->name('createUser')->middleware('auth');
Route::post('/user/edit', 'UserController@edit')->name('editUser')->middleware('auth');
Route::post('/user/destroy', 'UserController@destroy')->name('deleteUser')->middleware('auth');
Route::get('/perhitunganjatim', 'PerhitunganjatimController@index')->name('perhitunganjatim')->middleware('auth');
Route::get('/perhitunganjatim/getdata', 'PerhitunganjatimController@getPerhitunganjatim')->name('getperhitunganjatim')->middleware('auth');
Route::post('/perhitunganjatim/create', 'PerhitunganjatimController@create')->name('createPerhitunganjatim')->middleware('auth');
Route::post('/perhitunganjatim/edit', 'PerhitunganjatimController@edit')->name('editPerhitunganjatim')->middleware('auth');
Route::post('/perhitunganjatim/destroy', 'PerhitunganjatimController@destroy')->name('deletePerhitunganjatim')->middleware('auth');
Route::get('/rekapjatim', 'RekapjatimController@index')->name('rekapjatim')->middleware('auth');
Route::get('/rekapjatim/getdata', 'RekapjatimController@getPerhitungan')->name('getrekapjatim')->middleware('auth');
Route::post('/rekapjatim/updateSuara', 'RekapjatimController@updateSuara')->name('updateSuarajatim')->middleware('auth');
Route::get('/tps', 'TpsController@index')->name('tps')->middleware('auth');
Route::get('/tps/gettps', 'TpsController@getTps')->name('gettps')->middleware('auth');
Route::post('/tps/create', 'TpsController@create')->name('createTps')->middleware('auth');
Route::post('/tps/edit', 'TpsController@edit')->name('editTps')->middleware('auth');
Route::post('/tps/destroy', 'TpsController@destroy')->name('deleteTps')->middleware('auth');

// Route::get('/home', function () {
//     auth()->user()->assignRole('Admin');
// });