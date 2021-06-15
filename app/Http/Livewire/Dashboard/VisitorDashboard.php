<?php

namespace App\Http\Livewire\Dashboard;

use App\Product;
use Livewire\Component;

class VisitorDashboard extends Component
{
    public $products, $product, $product_is_processing, $product_is_approved;

    public function mount(){
        $this->products = Product::with('pabrik.perusahaan.user')->get();
        $this->product = Product::with('pabrik.perusahaan.user')->where('status', 1)->get();
        $this->product_is_processing = Product::with('pabrik.perusahaan.user')->where('status', 2)->get();
        $this->product_is_approved = Product::with('pabrik.perusahaan.user')->where('status', 3)->get();
    }
    public function render()
    {
        return view('livewire.dashboard.visitor-dashboard');
    }
}
