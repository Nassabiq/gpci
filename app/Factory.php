<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nama_fasilitas', 'slug', 'alamat_fasilitas', 'no_telp_fasilitas', 'fax_fasilitas', 'email_fasilitas', 'kodepos_fasilitas', 'contact', 'company_id'
    ];
    
    public function produk(){
        return $this->hasMany(Product::class);
    }
    
    public function perusahaan(){
       return $this->belongsTo(Company::class, 'company_id');
    }
}
