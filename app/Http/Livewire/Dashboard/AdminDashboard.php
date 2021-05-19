<?php

namespace App\Http\Livewire\Dashboard;

use App\Product;
use App\User;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $users, $product_is_processing, $product_is_approved;
    public function mount(){
        $this->users = User::where('status', 0)->get();
        $this->product_is_processing = Product::where('status', 2)->get();
        $this->product_is_approved = Product::where('status', 3)->inRandomOrder()->get();
    }
    public function render()
    {
        return view('livewire.dashboard.admin-dashboard');
    }
}
