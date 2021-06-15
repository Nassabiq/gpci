<?php

namespace App\Http\Livewire;

use App\Company;
use App\Document;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UploadDocument extends Component
{
    use WithFileUploads;
    public $document_name, $file;
    public $product,$document, $company, $category, $path, $nama_perusahaan;

    public $nama_dokumen;

    public function mount(){
        $user = Auth::user();
        if ($user->hasRole('client')) {
            $this->company = Company::where('user_id', $user->id)->with('factories.produk.document')->get();
            if (!$this->company) {
                toast('Tidak Ada Data Sertifikasi!','success');
                // toastr()->warning('Tidak Ada Data Sertifikasi!');
                return redirect()->route('home');
            } 
        } else {
            $this->company = Company::where('user_id', 0)->with('factories.produk.document')->get();
        }
    }
    public function render()
    {
        $produk = $this->product;
        $this->nama_perusahaan = Company::whereHas('factories', function ($q){
            $q->whereHas('produk', function($q){
                $q->where('id', $this->product);
            });
        })->value('nama_perusahaan');
        $this->document = Product::with('document')->withCount('document')->where('id', $produk)->first();
        return view('livewire.upload-document');
    }

    public function uploadDokumen($id, $name){
        if (!$this->nama_dokumen) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
                'nama_dokumen' => 'mimes:pdf,jpg,jpeg,png|max:5500',
            ], [
                'nama_dokumen.max' => 'Dokumen harus berukuran maksimal 5MB',
                'nama_dokumen.mimes' => 'Dokumen harus berbentuk JPG, JPEG atau PDF',
            ]);

            $document = Document::whereHas(
                "produk", function($q){ $q->where("products.id", $this->product); }
            )->find($id);
            
            $file = $this->nama_dokumen;
            $nama_file =
            Str::slug($this->nama_perusahaan).'-'.Str::slug($this->document->nama_produk).'-'.
            Str::slug($name);
            $data = $nama_file.'.'.$file->extension();

            // dd($name);
            $path = 'storage/checklist-dokumen/' . $this->nama_perusahaan;
            $filename= $path  . '/' . $data;
            
            foreach ($document->produk as $doc) {
                if ($doc->id == $this->product ) {
                    
                    if (file_exists($filename)) {
                        // chmod($filename, 0777);
                        unlink($filename);
                    }

                    $doc->pivot->status = 1;
                    $doc->pivot->nama_dokumen = $data;
                    $doc->pivot->save();
                }
            }

            $file->storeAs('checklist-dokumen/'. $this->nama_perusahaan, $data);

            // session()->flash('success', 'dokumen berhasil diubah');
            // toastr()->success('Data Berhasil ditambahkan!');
            toast('Data Berhasil ditambahkan!','success');
            return redirect()->route('dokumen-sertifikasi');
        }
    }
// -----------------------------------------------------------------------------------------------------------
// BATAS AKHIR AKTA NOTARIS
// -----------------------------------------------------------------------------------------------------------



}
