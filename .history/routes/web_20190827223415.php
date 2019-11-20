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
Route::post('/kaidah/store', 'KaidahController@store');
Route::get('/kaidah/{id_kategori}/edit', 'KaidahController@edit');
Route::post('/kaidah/{id_kategori}/update', 'KaidahController@update');
Route::get('/kaidah/{id_kategori}/delete', 'KaidahController@delete');

Route::get('/bobot', 'BobotController@index')->name('bobot');

Route::get('/tambahbobot', 'TambahbobotController@index');
Route::post('/tambahbobot', 'TambahbobotController@ts');

// Route::get('/tambahnilaibobot', 'TambahnilaibobotController@index')->name('tambahnilaibobot');

Route::get('/hasil', 'HasilController@index');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
