<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function kategoriProduk(){
        return $this->hasMany(Product::class);
    }
    public function kategoriAngket(){
        return $this->hasOne(Docrating::class, 'category_id');
    }
}
