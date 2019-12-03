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
    return view('login/login');
})->middleware('visitors');

// Route::get('/dashboard', 'SantriController@index');

// Route::get('/dashboard/detile/{NIM}', 'SantriController@detile');

// login
Route::group(['middleware' => 'visitors'], function() {
	Route::get('/register', 'LoginController@register');
	Route::post('/register', 'LoginController@postRegister');
	Route::post('/login', 'LoginController@postLogin');
});

// Route khusus admin
Route::group(['middleware' => 'admin'], function(){
	//dashboard
	Route::get('/dashboard', 'AdminController@admin');
	Route::get('/dashboard/verifikasi', 'AdminController@verif');
	//gedung / asrama
	Route::get('/dashboard/gedung', 'Gedung\GedungController@index');
	Route::post('/dashboard/ad_kamar', 'Gedung\GedungController@store');
	Route::post('/dashboard/ad_asrama', 'Gedung\GedungController@as');
	Route::get('/dashboard/gedung/delete/{id}', 'Gedung\GedungController@delete');
	Route::get('/dashboard/gedung/delete/asrama/{id}', 'Gedung\GedungController@del');
	//pendidikan
	Route::get('/dashboard/pendidikan', 'Pendidikan\PendidikanController@index');
	Route::post('/dashboard/pendidikan/add_fakultas', 'Pendidikan\PendidikanController@newfak');
	Route::get('/dashboard/pendidikan/delete/fak/{id}', 'Pendidikan\PendidikanController@delfak');
	Route::post('/dashboard/pendidikan/ad_prodi', 'Pendidikan\PendidikanController@newpro');
	Route::get('/dashboard/pendidikan/delete/pro/{id}', 'Pendidikan\PendidikanController@delpro');
	//santri
	Route::get('/dashboard/master/santri', 'Master\MasterController@index');
	Route::get('/dashboard/master/detile/{user_NIM}', 'Master\MasterController@detile');
	//persensi dan monitoring persensi
	Route::post('/dashboard/absensi', 'Persensi\AbsenController@store');
	Route::get('/dashboard/persensi', 'Persensi\AbsenController@index');
	Route::post('/dashboard/persensi/alfa', 'Persensi\AbsenController@alfa_store');
	Route::get('/dashboard/monitoring', 'Persensi\AbsenController@getAllPersensi');
	//update role
	Route::get('/dashboard/role', 'LoginController@role')->middleware('super admin');
	Route::put('/dashboard/role/update/{id}', 'LoginController@edtRole')->middleware('super admin');
});
 
// Route khusus User
Route::group(['middleware' => 'user'], function(){
	//nampilkan datanya
	Route::get('/user', 'UserController@index');
	//lengkapi profile
	Route::get('/user/add_profile', 'SantriController@new');
	Route::post('/user/ad_data/store', 'SantriController@store');
	Route::get('/user/update/{NIM}', 'SantriController@edit');
    Route::put('/user/update/{NIM}', 'SantriController@update');
    //lengkapi data orang tuanya
    Route::get('/user/ad_ortu', 'OrtuController@ad');
    Route::post('/user/ad_ortu/store', 'OrtuController@store');
    Route::get('/user/edit/ortu/c/{id}', 'OrtuController@edit');
    Route::put('/user/edit/ortu/{id}', 'OrtuController@update');
});

// Route khusus Tanpa middleware
Route::get('/active/{email}/{activationCode}', 'AdminController@aktif');
Route::post('/logo', 'LoginController@logout');





