<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nama_dokumen', 'category_id'
    ];
    public function produk(){
        return $this->belongsToMany(Product::class, 'product_document')
        ->withPivot('nama_dokumen', 'status', 'keterangan')
        ;
    }

    public function kategoriProduk(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
