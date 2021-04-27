<?php

use Illuminate\Support\Facades\Artisan;
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
Route::get('/command',function(){
    Artisan::call('storage:link');
});

Route::get('/', 'Auth\LoginController@showLoginForm');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


Route::group(['middleware' => ['auth', 'revalidate']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/account', 'AccountController@index')->name('account');
    Route::post('/account/edit', 'AccountController@changePassword');

    Route::prefix('sertifikasi')->group(function(){
        Route::group(['middleware' => ['role:client|super-admin']], function(){
            Route::get('/add-sertifikasi', 'SertifikasiController@addSertifikasi')->name('add-sertifikasi');
            Route::get('/show-sertifikasi', 'SertifikasiController@showDataSertifikasi')->name('show-sertifikasi');
            Route::get('/dokumen-sertifikasi', 'DocumentController@index')->name('dokumen-sertifikasi');
            
            // Add Product with Named Company
            Route::get('/add-plant', 'SertifikasiController@addPlant')->name('add-plant');
            Route::get('/add-produk', 'SertifikasiController@addProduk')->name('add-produk');
        });
        Route::group(['middleware' => ['role:admin|super-admin']], function(){
            Route::get('/data-sertifikasi', 'SertifikasiController@showAllDataSertifikasi')->name('data-sertifikasi');
            Route::get('/data-sertifikasi/{companies:id}', 'SertifikasiController@showSelectedDataSertifikasi')->name('detail-data-sertifikasi');
        });
    });
    Route::prefix('import')->group(function(){
        Route::group(['middleware' => ['role:admin|super-admin']], function(){
            Route::get('/data-sertifikasi', 'ImportDataController@index')->name('import-data-sertifikasi');
            Route::get('/checklist-dokumen', 'ChecklistDokumenController@index')->name('import-checklist-dokumen');
            Route::get('/kategori-produk', 'KategoriProdukController@index')->name('add-kategori-produk');
            Route::post('/kategori-produk/post', 'KategoriProdukController@store');
            Route::post('/kategori-produk/{id}/edit', 'KategoriProdukController@edit');
            Route::post('/kategori-produk/{id}/delete', 'KategoriProdukController@delete');
        });
    });
    Route::prefix('penilaian')->group(function(){
        Route::group(['middleware' => ['role:verifikator|super-admin']], function(){
            Route::get('/penilaian-sertifikasi', 'PenilaianController@index')->name('penilaian-sertifikasi');
            Route::get('/penilaian-sertifikasi/{products:id}', 'PenilaianController@detailsProduct')->name('detail-penilaian-sertifikasi');
        });
        Route::group(['middleware' => ['role:admin|super-admin']], function(){
            Route::get('/input-angket-penilaian', 'PenilaianController@angketPenilaian')->name('input-angket-penilaian');
            Route::post('/input-angket-penilaian/post', 'PenilaianController@inputAngketPenilaian');
            Route::post('/edit-angket-penilaian/edit/{id}', 'PenilaianController@editAngketPenilaian');
        });
    });
    Route::prefix('approve')->group(function(){
        Route::group(['middleware' => ['role:admin|super-admin']], function(){
            Route::get('/approve-dokumen', 'ApproveController@approveDokumen')->name('approve-dokumen');
            Route::get('/approve-sertifikasi', 'ApproveController@approveSertifikasi')->name('approve-sertifikasi');
            Route::get('/approve-sertifikasi/{products:id}', 'ApproveController@detailSertifikasi')->name('detail-approve-sertifikasi');
        });
    });
    Route::prefix('user')->group(function(){
        Route::group(['middleware' => ['role:admin|super-admin']], function(){
            Route::get('/user-management', 'UserAdministrationController@index')->name('user-management');
            Route::post('/user-management/delete-user/{users:id}', 'UserAdministrationController@destroy');
            Route::post('/add-account/post', 'UserAdministrationController@addAccount');
            
            Route::get('/approve-user', 'UserAdministrationController@approveUser')->name('approve-user');
            Route::post('/approve-user/{users:id}', 'UserAdministrationController@approve');

        });
    });
    
});

Route::get('/email', 'TestingMailController@index');
Route::get('/cetak-pdf/{products:id}', 'SertifikasiController@cetak_pdf');
