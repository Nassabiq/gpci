<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'akta_notaris_doc','tdp_doc', 'npwp_doc', 'api_doc', 'daftar_merk_doc', 'sds_produk_doc', 'material_bill_doc', 'sds_material_doc', 'product_id'
    ];
    public function produk(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
