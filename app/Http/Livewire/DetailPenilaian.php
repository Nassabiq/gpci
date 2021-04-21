<?php

namespace App\Http\Livewire;

use App\Docrating;
use App\Product;
use App\Rating;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class DetailPenilaian extends Component
{
    use WithFileUploads;
    public $product, $produk;
    public $angket_penilaian, $laporan_ringkas_verifikasi, $recommendation_for_improvement;

    public function mount(){
    }
    public function render()
    {
        $this->produk = Product::with('ratings', 'kategoriProduk.kategoriAngket')->find($this->product);
        return view('livewire.detail-penilaian');
    }

    public function changeStatus($id){
        $product = Product::find($id);
        $product->status = 2;
        $product->save();

        $this->dispatchBrowserEvent('hideModal', [
            'type' => 'success',
            'message' => 'Status Produk Sudah Diubah!'
        ]);
    }

    public function download($id){
        $product = Docrating::find($id);
        // dd($product);
        return response()->download(storage_path('app/template_angket/'.$product->angket_penilaian_doc));
    }
    public function angketPenilaian($id){
        if (!$this->angket_penilaian) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
                'angket_penilaian' => 'mimes:pdf,xlsx|max:4096',
                ]);
            $file = $this->angket_penilaian;

            $filename= 'storage/dokumen_audit/' . $this->produk->nama_produk . '/' .
            $this->produk->ratings->angket_penilaian;
            
            if($this->produk->ratings->angket_penilaian){
                unlink($filename);
            }

            $nama_file = $this->produk->nama_produk.'-'.'Angket-Penilaian';
            $data = $nama_file.'.'.$file->extension();
            $file->storeAs('dokumen_audit/'. $this->produk->nama_produk, $data);
            
            $document = Rating::find($id);
            $document->angket_penilaian = $data;
            $document->save();
            
            return redirect()->to('/penilaian/penilaian-sertifikasi/'.$id);
        }
    }
    public function laporanRingkas($id){
        if (!$this->laporan_ringkas_verifikasi) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
                'laporan_ringkas_verifikasi' => 'mimes:pdf|max:4096',
                ]);
            $file = $this->laporan_ringkas_verifikasi;

            $filename = 'storage/dokumen_audit/' . $this->produk->nama_produk . '/' .$this->produk->ratings->laporan_ringkas_verifikasi;
            
            if($this->produk->ratings->laporan_ringkas_verifikasi){
                unlink($filename);
            }

            $nama_file = $this->produk->nama_produk.'-'.'Laporan-Ringkas-Verifikasi';
            $data = $nama_file.'.'.$file->extension();
            $file->storeAs('dokumen_audit/'. $this->produk->nama_produk, $data);
            
            $document = Rating::find($id);
            $document->laporan_ringkas_verifikasi = $data;
            $document->save();
            
            return redirect()->to('/penilaian/penilaian-sertifikasi/'.$id);
        }
    }
    public function rekomendasi($id){
        if (!$this->recommendation_for_improvement) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
                'recommendation_for_improvement' => 'mimes:pdf|max:4096',
                ]);
            $file = $this->recommendation_for_improvement;

            $filename = 'storage/dokumen_audit/' . $this->produk->nama_produk . '/'
            .$this->produk->ratings->recommendation_for_improvement;
            
            if($this->produk->ratings->recommendation_for_improvement){
                unlink($filename);
            }

            $nama_file = $this->produk->nama_produk.'-'.'Recommendation-For-Improvement';
            $data = $nama_file.'.'.$file->extension();
            $file->storeAs('dokumen_audit/'. $this->produk->nama_produk, $data);
            
            $document = Rating::find($id);
            $document->recommendation_for_improvement = $data;
            $document->save();
            
            return redirect()->to('/penilaian/penilaian-sertifikasi/'.$id);
        }
    }
}
