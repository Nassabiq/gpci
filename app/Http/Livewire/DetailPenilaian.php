<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class DetailPenilaian extends Component
{
    public $product, $produk;

    public function mount(){
    }
    public function render()
    {
        $this->produk = Product::find($this->product);
        return view('livewire.detail-penilaian');
    }

    public function changeStatus($id){
        $product = Product::find($id);
        $product->status = 2;
        $product->save();

        $this->emit('hideModal');
    }
}
