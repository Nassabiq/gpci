<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'angket_penilaian', 'laporan_ringkas_verifikasi', 'recommendation_for_improvement', 'product_id'
    ];

    public function produk()
    {
        return $this->belongsTo(Product::class);
    }
}
