<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nama_produk', 'slug' , 'deskripsi_produk', 'tipe_model', 'merk_dagang', 'tipe_pengemasan','foto_produk', 'ukuran', 'factory_id', 'status', 'jenis_sertifikasi', 'tgl_pendaftaran', 'tgl_approve', 'tgl_masa_berlaku', 'category_id', 'scoring_id'
    ];
    public function pabrik(){
        return $this->belongsTo(Factory::class, 'factory_id');
    }
    public function document(){
        return $this->belongsToMany(Document::class, 'product_document')->withPivot('nama_dokumen', 'status',
        'keterangan');
    }
    public function kategoriProduk(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function scoring(){
        return $this->belongsTo(Scoring::class, 'scoring_id');
    }
    public function ratings(){
        return $this->hasOne(Rating::class);
    }
}
