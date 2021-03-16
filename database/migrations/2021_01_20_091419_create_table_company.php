<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->text('alamat_perusahaan');
            $table->string('email_perusahaan')->unique();
            $table->string('no_telp_perusahaan');
            $table->string('fax_perusahaan')->nullable();
            $table->string('kodepos_perusahaan');
            $table->string('no_akta_notaris');
            $table->string('no_siup');
            $table->string('no_tdp');
            $table->string('no_npwp');
            $table->string('no_api');
            $table->boolean('sertifikasi_ekolabel');
            $table->string('lembaga_ekolabel')->nullable();
            $table->string('website_perusahaan');
            $table->json('contact');
            $table->foreignId('user_id');
        });

        Schema::create('factories', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fasilitas');
            $table->string('alamat_fasilitas');
            $table->string('no_telp_fasilitas');
            $table->string('fax_fasilitas')->nullable();
            $table->string('email_fasilitas')->unique();
            $table->string('kodepos_fasilitas');
            $table->json('contact');
            $table->foreignId('company_id');
        }); 
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('deskripsi_produk');
            $table->string('tipe_model');
            $table->string('merk_dagang');
            $table->string('tipe_pengemasan');
            $table->json('foto_produk');
            $table->string('ukuran');
            $table->integer('status');
            $table->boolean('jenis_sertifikasi');
            $table->timestamp('tgl_pendaftaran');
            $table->timestamp('tgl_approve')->nullable();
            $table->timestamp('tgl_masa_berlaku')->nullable();
            $table->foreignId('factory_id');
            $table->foreignId('category_id');
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('categories');
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('akta_notaris_doc')->nullable();
            $table->integer('status_akta_notaris_doc')->nullable();
            $table->string('ket_akta_notaris_doc')->nullable();

            $table->string('siup_doc')->nullable();
            $table->integer('status_siup_doc')->nullable();
            $table->string('ket_siup_doc')->nullable();
            
            $table->string('tdp_doc')->nullable();
            $table->integer('status_tdp_doc')->nullable();
            $table->string('ket_tdp_doc')->nullable();
            
            $table->string('npwp_doc')->nullable();
            $table->integer('status_npwp_doc')->nullable();
            $table->string('ket_npwp_doc')->nullable();
            
            $table->string('api_doc')->nullable();
            $table->integer('status_api_doc')->nullable();
            $table->string('ket_api_doc')->nullable();
            
            $table->string('daftar_merk_doc')->nullable();
            $table->integer('status_daftar_merk_doc')->nullable();
            $table->string('ket_daftar_merk_doc')->nullable();
            
            $table->string('sds_produk_doc')->nullable();
            $table->integer('status_sds_produk_doc')->nullable();
            $table->string('ket_sds_produk_doc')->nullable();
            
            $table->string('material_bill_doc')->nullable();
            $table->integer('status_material_bill_doc')->nullable();
            $table->string('ket_material_bill_doc')->nullable();
            
            $table->string('sds_material_doc')->nullable();
            $table->integer('status_sds_material_doc')->nullable();
            $table->string('ket_sds_material_doc')->nullable();
            
            $table->foreignId('product_id');
        });
        
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('angket_penilaian');
            $table->string('laporan_ringkas_verifikasi');
            $table->string('recommendation_for_improvement');

            $table->foreignId('product_id');
        });
        Schema::create('docratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('angket_penilaian_doc');

            $table->foreignId('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_company');
    }
}
