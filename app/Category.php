<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function kategoriProduk(){
        return $this->hasOne(Product::class);
    }
    public function kategoriAngket(){
        return $this->hasOne(Docrating::class);
    }
}
