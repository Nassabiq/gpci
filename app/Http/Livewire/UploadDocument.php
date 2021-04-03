<?php

namespace App\Http\Livewire;

use App\Company;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadDocument extends Component
{
    use WithFileUploads;
    public $document_name, $file;
    public $product,$document, $company, $category, $path;

    public $akta_notaris_doc, $siup_doc, $tdp_doc , $npwp_doc, $api_doc, $daftar_merk_doc, $sds_produk_doc, $material_bill_doc, $sds_material_doc;

    public function mount(){  
        $id_user = Auth::user()->id;
        $this->company = Company::where('user_id', $id_user)->with('factories.produk.document')->first();
        
    }
    public function render()
    {
        $produk = $this->product;
        $this->document = Document::where('product_id', $produk)->with('produk')->first(); 
        return view('livewire.upload-document');
    }


// -----------------------------------------------------------------------------------------------------------
// AKTA NOTARIS
// Function yang tersedia : 
//      - Update Dokumen Akta Notaris
// -----------------------------------------------------------------------------------------------------------

    public function updateAktaNotaris($id){
        if (!$this->akta_notaris_doc) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
                'akta_notaris_doc' => 'mimes:pdf|max:4096',
            ]);

            $document = Document::find($id);
            
            $file = $this->akta_notaris_doc;
            $nama_file =
            $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'Dokumen-Akta-Notaris';
            $data = $nama_file.'.'.$file->extension();

            $filename= 'storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->akta_notaris_doc;
            if($this->document->akta_notaris_doc){
                unlink($filename);
            }

            $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);

            $document->akta_notaris_doc = $data;
            $document->status_akta_notaris_doc = 1;
            $document->save();
            
            session()->flash('success', 'dokumen berhasil diubah');
            return redirect()->route('dokumen-sertifikasi');
        }
    }
// -----------------------------------------------------------------------------------------------------------
// BATAS AKHIR AKTA NOTARIS
// -----------------------------------------------------------------------------------------------------------



// -----------------------------------------------------------------------------------------------------------
// SIUP
// -----------------------------------------------------------------------------------------------------------
    public function updateSIUP($id){
        // dd($this->siup_doc);
        if (!$this->siup_doc) {
            $this->dispatchBrowserEvent('swal:error', [
            'type' => 'error',
            'message' => 'File tidak Ada!'
        ]);
        } else {
            $this->validate([
                'siup_doc' => 'mimes:pdf|max:4096',
            ]);
        
            $document = Document::find($id);

            $file = $this->siup_doc;
            $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'SIUP';
            $data = $nama_file.'.'.$file->extension();

            $filename= 'storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->siup_doc;
                if($this->document->siup_doc){
                    unlink($filename);
                }

            $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);

            $document->siup_doc = $data;
            $document->status_siup_doc = 1;
            $document->save();

            session()->flash('success', 'dokumen berhasil diubah');
            return redirect()->route('dokumen-sertifikasi');
        }
    }
// -----------------------------------------------------------------------------------------------------------
// BATAS AKHIR SIUP
// -----------------------------------------------------------------------------------------------------------


// -----------------------------------------------------------------------------------------------------------
// TDP
// -----------------------------------------------------------------------------------------------------------    
    public function updateTDP($id){
    // dd($this->siup_doc);
        if (!$this->tdp_doc) {
            $this->dispatchBrowserEvent('swal:error', [
            'type' => 'error',
            'message' => 'File tidak Ada!'
        ]);
        } else {
            $this->validate([
            'tdp_doc' => 'mimes:pdf|max:4096',
        ]);

        $document = Document::find($id);

        $file = $this->tdp_doc;
        $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'TDP';
        $data = $nama_file.'.'.$file->extension();

        $filename= 'storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->tdp_doc;
            if($this->document->tdp_doc){
            unlink($filename);
        }

        $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);

        $document->tdp_doc = $data;
        $document->status_tdp_doc = 1;
        $document->save();

        session()->flash('success', 'dokumen berhasil diubah');
        return redirect()->route('dokumen-sertifikasi');
        }
    }
// -----------------------------------------------------------------------------------------------------------
// BATAS AKHIR TDP
// -----------------------------------------------------------------------------------------------------------



// -----------------------------------------------------------------------------------------------------------
// NPWP
// -----------------------------------------------------------------------------------------------------------
    public function updateNPWP($id){

    if (!$this->npwp_doc) {
        $this->dispatchBrowserEvent('swal:error', [
            'type' => 'error',
            'message' => 'File tidak Ada!'
        ]);
    } else {
        $this->validate([
            'npwp_doc' => 'mimes:pdf|max:4096',
        ]);

        $document = Document::find($id);

        $file = $this->npwp_doc;
        $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'NPWP';
        $data = $nama_file.'.'.$file->extension();

        $filename= 'storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->npwp_doc;
        if($this->document->npwp_doc){
            unlink($filename);
        }

        $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);

        $document->npwp_doc = $data;
        $document->status_npwp_doc = 1;
        $document->save();

        session()->flash('success', 'dokumen berhasil diubah');
        return redirect()->route('dokumen-sertifikasi');
        }
    }
    // -----------------------------------------------------------------------------------------------------------
    // BATAS AKHIR NPWP
    // -----------------------------------------------------------------------------------------------------------
    
    
    
    // -----------------------------------------------------------------------------------------------------------
    // ANGKA PENGENAL IMPORTIR (API)
    // -----------------------------------------------------------------------------------------------------------
    public function updateAPI($id){

        if (!$this->api_doc) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
    } else {
        $this->validate([
            'api_doc' => 'mimes:pdf|max:4096',
        ]);

        $document = Document::find($id);

        $file = $this->api_doc;
        $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'API';
        $data = $nama_file.'.'.$file->extension();

        $filename= 'storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->api_doc;
            if($this->document->api_doc){
                unlink($filename);
            }

        $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);

        $document->api_doc = $data;
        $document->status_api_doc = 1;
        $document->save();

        session()->flash('success', 'dokumen berhasil diubah');
        return redirect()->route('dokumen-sertifikasi');
        }
    }
// -----------------------------------------------------------------------------------------------------------
// BATAS AKHIR ANGKA PENGENAL IMPORTIR (API)
// -----------------------------------------------------------------------------------------------------------



// -----------------------------------------------------------------------------------------------------------
// DAFTAR MERK
// -----------------------------------------------------------------------------------------------------------
    public function updateDaftarMerk($id){
        if (!$this->daftar_merk_doc) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
            'daftar_merk_doc' => 'mimes:pdf|max:4096',
        ]);

        $document = Document::find($id);

        $file = $this->daftar_merk_doc;
        $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'Daftar-Merk';
        $data = $nama_file.'.'.$file->extension();

        $filename= 'storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->daftar_merk_doc;
        if($this->document->daftar_merk_doc){
            unlink($filename);
        }

        $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);

        $document->daftar_merk_doc = $data;
        $document->status_daftar_merk_doc = 1;
        $document->save();

        session()->flash('success', 'dokumen berhasil diubah');
        return redirect()->route('dokumen-sertifikasi');
        }
    }
// -----------------------------------------------------------------------------------------------------------
// BATAS AKHIR DAFTAR MERK
// -----------------------------------------------------------------------------------------------------------



// -----------------------------------------------------------------------------------------------------------
// SDS PRODUK
// -----------------------------------------------------------------------------------------------------------
    public function updateSDSProduk($id){

        if (!$this->sds_produk_doc) {
            $this->dispatchBrowserEvent('swal:error', [
            'type' => 'error',
            'message' => 'File tidak Ada!'
        ]);
        } else {
            $this->validate([
                'sds_produk_doc' => 'mimes:pdf|max:4096',
            ]);

            $document = Document::find($id);

            $file = $this->sds_produk_doc;
            $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'SDS-Produk';
            $data = $nama_file.'.'.$file->extension();

            $filename= 'storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->sds_produk_doc;
            
            if($this->document->sds_produk_doc){
                unlink($filename);
            }

            $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);

            $document->sds_produk_doc = $data;
            $document->status_sds_produk_doc = 1;
            $document->save();

            session()->flash('success', 'dokumen berhasil diubah');
            return redirect()->route('dokumen-sertifikasi');
        }
    }
// -----------------------------------------------------------------------------------------------------------
// BATAS AKHIR SDS PRODUK
// -----------------------------------------------------------------------------------------------------------



// -----------------------------------------------------------------------------------------------------------
// MATERIAL BILL
// -----------------------------------------------------------------------------------------------------------
    public function updateMaterialBill($id){

        if (!$this->material_bill_doc) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
                'material_bill_doc' => 'mimes:pdf|max:4096',
            ]);

        $document = Document::find($id);

        $file = $this->material_bill_doc;
        $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'Material-Bill';
        $data = $nama_file.'.'.$file->extension();

        $filename= 'storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->material_bill_doc;

        if($this->document->material_bill_doc){
            unlink($filename);
        }

        $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);

        $document->material_bill_doc = $data;
        $document->status_material_bill_doc = 1;
        $document->save();

        session()->flash('success', 'dokumen berhasil diubah');
        return redirect()->route('dokumen-sertifikasi');
        }
    }
// -----------------------------------------------------------------------------------------------------------
// BATAS AKHIR MATERIAL BILL
// -----------------------------------------------------------------------------------------------------------



// -----------------------------------------------------------------------------------------------------------
// SDS MATERIAL
// -----------------------------------------------------------------------------------------------------------
    public function updateSDSMaterial($id){

        if (!$this->sds_material_doc) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
                'sds_material_doc' => 'mimes:pdf|max:4096',
            ]);

        $document = Document::find($id);

        $file = $this->sds_material_doc;
        $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'SDS-Material';
        $data = $nama_file.'.'.$file->extension();

        $filename= 'storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->sds_material_doc;

        if($this->document->sds_material_doc){
            unlink($filename);
        }

        $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);

        $document->sds_material_doc = $data;
        $document->status_sds_material_doc = 1;
        $document->save();

        session()->flash('success', 'dokumen berhasil diubah');
        return redirect()->route('dokumen-sertifikasi');
        }
    }
// -----------------------------------------------------------------------------------------------------------
// BATAS AKHIR SDS MATERIAL
// -----------------------------------------------------------------------------------------------------------
}
