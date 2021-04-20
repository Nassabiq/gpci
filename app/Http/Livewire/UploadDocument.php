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
    public $product,$document, $company, $category, $path;

    public $nama_dokumen;

    public function mount(){  
        $id_user = Auth::user()->id;
        $this->company = Company::where('user_id', $id_user)->with('factories.produk.document')->first();
        
    }
    public function render()
    {
        $produk = $this->product;
        $this->document = Product::with('document')->where('id', $produk)->find($produk);
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
                'nama_dokumen' => 'mimes:pdf|max:4096',
            ]);

            $document = Document::with('produk')->whereHas(
                "produk", function($q){ $q->where("products.id", $this->product); }
            )->find($id);
            // dd($document->produk());
            
            $file = $this->nama_dokumen;
            $nama_file =
            Str::slug($this->company->nama_perusahaan).'-'.Str::slug($this->document->nama_produk).'-'.
            Str::slug($name);
            $data = $nama_file.'.'.$file->extension();


            $filename= 'storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $name;
            if($this->document->nama_dokumen){
                unlink($filename);
            }

            foreach ($document->produk as $doc) {
                if ($doc->id == $this->product ) {
                    $doc->pivot->status = 1;
                    $doc->pivot->nama_dokumen = $data;
                    $doc->pivot->save();
                }
            }

            $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);

            session()->flash('success', 'dokumen berhasil diubah');
            return redirect()->route('dokumen-sertifikasi');
        }
    }
// -----------------------------------------------------------------------------------------------------------
// BATAS AKHIR AKTA NOTARIS
// -----------------------------------------------------------------------------------------------------------



}
