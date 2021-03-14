<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class ApproveSertifikasi extends Component
{
    public $products;
    public function render()
    {
        $this->products =  Product::get();
        return view('livewire.approve-sertifikasi');
    }
}
