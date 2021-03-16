<?php

namespace App\Http\Livewire;

use App\Product;
use Carbon\Carbon;
use Livewire\Component;

class ApproveSertifikasi extends Component
{
    public $products;
    public function render()
    {
        $this->products =  Product::with('ratings')->get();
        return view('livewire.approve-sertifikasi');
    }
    
    public function approveSertifikasi($id)
    {
        $product = Product::find($id);
        $product->status = 3;
        $product->tgl_approve = Carbon::now();
        $product->tgl_masa_berlaku = Carbon::now()->addYear();
        $product->save();
        return redirect()->route('approve-sertifikasi');
    }
}
