<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docrating extends Model
{
    public $timestamps = false;
    protected $fillable = [
    'angket_penilaian_doc', 'category_id'
    ];

    public function kategoriAngket()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
