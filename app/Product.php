<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nama_produk', 'deskripsi_produk', 'tipe_model', 'merk_dagang', 'tipe_pengemasan','foto_produk', 'ukuran', 'factory_id', 'status', 'jenis_sertifikasi', 'tgl_pendaftaran', 'tgl_approve', 'tgl_masa_berlaku', 'category_id'
    ];
    public function pabrik(){
        return $this->belongsTo(Factory::class, 'factory_id');
    }
    public function document(){
        return $this->hasOne(Document::class);
    }
    public function kategoriProduk(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function ratings(){
        return $this->hasOne(Rating::class);
    }
}
