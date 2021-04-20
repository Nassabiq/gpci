<?php

namespace App\Http\Livewire\Dashboard;

use App\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ClientDashboard extends Component
{
    public $product, $product_is_processing, $product_is_approved;
    
    public function mount(){
        $this->product = Product::with('pabrik.perusahaan.user')->whereHas('pabrik', function($q){
            $q->whereHas('perusahaan', function($x){
                $x->where('user_id', Auth::id());
            });
        })->get();

        $this->product_is_processing = Product::with('pabrik.perusahaan.user')->where('status', 2)->whereHas('pabrik',
        function($q){
            $q->whereHas('perusahaan', function($x){
                $x->where('user_id', Auth::id());
            });
        })->get();

        $this->product_is_approved = Product::with('pabrik.perusahaan.user')->where('status', 3)->whereHas('pabrik',
        function($q){
            $q->whereHas('perusahaan', function($x){
                $x->where('user_id', Auth::id());
            });
        })->get();
    }

    public function render()
    {
        return view('livewire.dashboard.client-dashboard');
    }
}
