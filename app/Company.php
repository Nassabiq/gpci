<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nama_perusahaan' , 'alamat_perusahaan', 'email_perusahaan', 'no_telp_perusahaan', 'fax_perusahaan' , 'kodepos_perusahaan', 'no_akta_notaris', 'no_siup', 'no_tdp', 'no_npwp', 'no_api', 'sertifikasi_ekolabel', 'lembaga_ekolabel', 'website_perusahaan' , 'contact', 'user_id'
    ];

    public function factories(){
        return $this->hasMany(Factory::class);
    }
}
