<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert([
            [
                'id' => 1,
                'nama_dokumen' => 'Salinan Akta Notaris Pendirian Perusahaan.',
                'category_id' => '100',
            ],
            [
                'id' => 2,
                'nama_dokumen' => 'Salinan Surat Izin Usaha Perdagangan (SIUP)',
                'category_id' => '100',
            ],
            [
                'id' => 3,
                'nama_dokumen' => 'Salinan Tanda Daftar Perusahaan (TDP).',
                'category_id' => '100',
            ],
            [
                'id' => 4,
                'nama_dokumen' => 'Salinan Nomor Pokok Wajib Pajak (NPWP) perusahaan.',
                'category_id' => '100',
            ],
            [
                'id' => 5,
                'nama_dokumen' => 'Informasi Importer dan Salinan Angka Pengenal Importir (API).',
                'category_id' => '100',
            ],
            [
                'id' => 6,
                'nama_dokumen' => 'Salinan Tanda Daftar Merk terbitan Dirjen HAKI Kemenhumham.',
                'category_id' => '100',
            ],
            [
                'id' => 7,
                'nama_dokumen' => 'Lembar keselamatan bahan (SDS) dari produk yang akan disertifikasi.',
                'category_id' => '100',
            ],
            [
                'id' => 8,
                'nama_dokumen' => 'Bill of material dari produk yang akan disertifikasi.',
                'category_id' => '100',
            ],
            [
                'id' => 9,
                'nama_dokumen' => 'Lembar keselamatan bahan (SDS) dari seluruh bahan baku yang digunakan.',
                'category_id' => '100',
            ],
        ]);
    }
}
