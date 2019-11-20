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
Route::get('/', function ()
 {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Auth::routes();

Route::post('/', 'SubmitController@submit');
// Route::get('/mahasiswa', 'MahasiswaController@index');
Route::get('/mahasiswa', 'SubmitController@index')->name('mahasiswa');
Route::get('/mahasiswa/{mahasiswa}/delete', 'SubmitController@delete');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tandado', 'TandaDOController@index')->name('tandado');
Route::post('/tandado/store', 'TandaDOController@store');
Route::get('/tandado/{id_tanda}/edit', 'TandaDOController@edit');
Route::post('/tandado/{id_tanda}/update', 'TandaDOController@update');
Route::get('/tandado/{id_tanda}/delete', 'TandaDOController@delete');

Route::get('/kategorido', 'KategoriDOController@index')->name('kategorido');
Route::post('/kategorido/store', 'KategoriDOController@store');
Route::get('/kategorido/{id_kategori}/edit', 'KategoriDOController@edit');
Route::post('/kategorido/{id_kategori}/update', 'KategoriDOController@update');
Route::get('/kategorido/{id_kategori}/delete', 'KategoriDOController@delete');

Route::get('/kaidah', 'KaidahController@index')->name('kaidah');
Route::get('/kaidah/{id_kategori}/delete', 'KaidahController@delete');

Route::get('/bobot/{id_kategori}/show', 'BobotController@index');
Route::get('/bobot', 'BobotController@index');
Route::get('/bobot/{id_kategori}/delete', 'BobotController@delete');

Route::get('/tambahbobot/{id_kategori}/show', 'TambahbobotController@index');
Route::post('/tambahbobot/insert', 'TambahbobotController@insert');

Route::get('/bobotbaru', 'BobotbaruController@index')->name('bobotbaru');
Route::get('/bobotbaru/{id_tanda}/delete', 'BobotbaruController@delete');

Route::get('/bobotbaru/{id_tanda}/show', 'BobotbaruController@index');
Route::get('/bobotbaru', 'BobotbaruController@index');
Route::get('/bobotbaru/{id_tanda}/delete', 'BobotController@delete');

Route::get('/hasil', 'HasilController@index');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
