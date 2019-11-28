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

// Route::get('/', function () {
//     return view('login/login');
// });

Route::get('/dashboard', 'SantriController@index');

// Route::get('/dashboard/detile/{NIM}', 'SantriController@detile');

// login
Route::group(['middleware' => 'visitors'], function() {
	Route::get('/register', 'LoginController@register');
	Route::post('/register', 'LoginController@postRegister');
	Route::post('/login', 'LoginController@postLogin');
	Route::get('/', function () {
    return view('login/login');
});

// Route khusus admin
Route::group(['middleware' => 'admin'], function(){
	Route::get('/dashboard', 'AdminController@admin');
	Route::get('/dashboard/verifikasi', 'AdminController@verif');
	Route::get('/dashboard/gedung', 'Gedung\GedungController@index');
	Route::post('/dashboard/ad_kamar', 'Gedung\GedungController@store');
	Route::post('/dashboard/ad_asrama', 'Gedung\GedungController@as');
	Route::get('/dashboard/gedung/delete/{id}', 'Gedung\GedungController@delete');
	Route::get('/dashboard/gedung/delete/asrama/{id}', 'Gedung\GedungController@del');
	Route::get('/dashboard/pendidikan', 'Pendidikan\PendidikanController@index');
	Route::post('/dashboard/pendidikan/add_fakultas', 'Pendidikan\PendidikanController@newfak');
	Route::get('/dashboard/pendidikan/delete/fak/{id}', 'Pendidikan\PendidikanController@delfak');
	Route::post('/dashboard/pendidikan/ad_prodi', 'Pendidikan\PendidikanController@newpro');
	Route::get('/dashboard/pendidikan/delete/pro/{id}', 'Pendidikan\PendidikanController@delpro');
	Route::get('/dashboard/master/santri', 'Master\MasterController@index');
	Route::get('/dashboard/master/detile/{user_NIM}', 'Master\MasterController@detile');
	Route::get('/dashboard/persensi', 'Persensi\AbsenController@index');
	Route::post('/dashboard/absensi', 'Persensi\AbsenController@store');
	Route::post('/dashboard/persensi/alfa', 'Persensi\AbsenController@alfa_store');
});

// Route khusus User
Route::group(['middleware' => 'user'], function(){
	Route::get('/user', 'UserController@index');
	Route::get('/user/add_profile', 'SantriController@new');
	Route::post('/user/ad_data/store', 'SantriController@store');
	Route::get('/user/update/{NIM}', 'SantriController@edit');
    Route::put('/user/update/{NIM}', 'SantriController@update');
    Route::get('/user/ad_ortu', 'OrtuController@ad');
    Route::post('/user/ad_ortu/store', 'OrtuController@store');
    Route::get('/user/edit/ortu{id}', 'OrtuController@edit');
    Route::put('/user/edit/ortu/{id}', 'OrtuController@update');
});

// Route khusus Tanpa middleware
Route::post('/logo', 'LoginController@logout');

Route::get('/active/{email}/{activationCode}', 'AdminController@aktif');



