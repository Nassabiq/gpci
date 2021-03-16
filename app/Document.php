<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'akta_notaris_doc',
        'ket_akta_notaris_doc',

        'siup_doc',
        'ket_siup_doc',

        'tdp_doc',
        'ket_tdp_doc',
        
        'npwp_doc', 
        'ket_npwp_doc',
        
        'api_doc', 
        'ket_api_doc',
        
        'daftar_merk_doc', 
        'ket_daftar_merk_doc',
        
        'sds_produk_doc', 
        'ket_sds_produk_doc',
        
        'material_bill_doc', 
        'ket_material_bill_doc',
        
        'sds_material_doc', 
        'ket_sds_material_doc',
        
        'product_id',
    ];
    public function produk(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
