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


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('sertifikasi')->group(function(){
        Route::group(['middleware' => ['role:client|super-admin']], function(){
            Route::get('/add-sertifikasi', 'SertifikasiController@addSertifikasi')->name('add-sertifikasi');
            Route::get('/show-sertifikasi', 'SertifikasiController@showDataSertifikasi')->name('show-sertifikasi');
            Route::get('/dokumen-sertifikasi', 'DocumentController@index')->name('dokumen-sertifikasi');
            
            // Add Product with Named Company
            Route::get('/add-plant', 'SertifikasiController@addPlant')->name('add-plant');
            Route::get('/add-produk', 'SertifikasiController@addProduk')->name('add-produk');
        });
    });
    Route::prefix('penilaian')->group(function(){
        Route::group(['middleware' => ['role:verifikator|super-admin']], function(){
            Route::get('/penilaian-sertifikasi', 'PenilaianController@index')->name('penilaian-sertifikasi');
            Route::get('/penilaian-sertifikasi/{products:id}', 'PenilaianController@detailsProduct')->name('detail-penilaian-sertifikasi');
        });
    });
    Route::prefix('approve')->group(function(){
        Route::group(['middleware' => ['role:admin|super-admin']], function(){
            Route::get('/approve-dokumen', 'ApproveController@approveDokumen')->name('approve-dokumen');
            Route::get('/approve-sertifikasi', 'ApproveController@approveSertifikasi')->name('approve-sertifikasi');
        });
    });
    
});
