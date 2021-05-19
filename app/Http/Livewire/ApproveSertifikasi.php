<?php

namespace App\Http\Livewire;

use App\Product;
use Carbon\Carbon;
use Livewire\Component;

class ApproveSertifikasi extends Component
{
    public $product, $produk, $scoring_id;
    public function render()
    {
        $this->produk = Product::with('ratings')->find($this->product);
        return view('livewire.approve-sertifikasi');
    }
    
    public function approveSertifikasi($id)
    {
        $this->validate([
            'scoring_id' => 'required',
        ],
        [
            'scoring_id.required' => 'harap isi scoring sertifikasi terlebih dahulu'
        ]
        );
        $product = Product::find($id);
        $product->status = 3;
        $product->scoring_id = $this->scoring_id;
        $product->tgl_approve = date('Y-m-d H:i:s');
        $product->tgl_masa_berlaku = Carbon::now()->addYear()->locale('id');
        $product->save();

        // toastr()->success('Sertifikasi Berhasil Diverifikasi!');
        $this->dispatchBrowserEvent('submit', [
            'type' => 'success',
            'message' => 'Sertifikasi Berhasil di-approve!'
        ]);
        return redirect()->to('/approve/approve-sertifikasi/'.$id);
    }
}
