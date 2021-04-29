<?php

namespace App\Http\Livewire\Dashboard;

use App\Product;
use Carbon\Carbon;
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
        $this->showToast();
        toast('Tidak Ada Data Sertifikasi!','warning');
        return view('livewire.dashboard.client-dashboard');
    }

    public function showToast(){
        foreach ($this->product_is_approved as $item) {
            $now = Carbon::now()->toDateString();
            $date_interval = Carbon::parse($item->tgl_masa_berlaku)->subMonth(12)->addDay()->toDateString();

            if ($now == $date_interval) {
                $this->dispatchBrowserEvent('show-toast', [
                    'type' => 'warning',
                    'message' => 'Checklist Dokumen Berhasil Ditambahkan!'
                ]);
            }
        }
    }
}
