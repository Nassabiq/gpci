<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scoring extends Model
{
    public $timestamps = false;

    public function scoring(){
        return $this->hasMany(Product::class);
    }
}
