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
        $this->company = Company::with('factories.produk.document')->where('user_id' , $id_user)->find($id_user);
        
    }
    public function render()
    {
        $produk = $this->product;
        $this->document = Document::with('produk')->find($produk); 
        return view('livewire.upload-document');
    }


// -----------------------------------------------------------------------------------------------------------
// AKTA NOTARIS
// Function yang tersedia : 
//      - Upload Dokumen Akta Notaris
//      - Approve Dokumen Akta Notaris (Only Admin and Super Admin which has privillege
//      - Update Dokumen Akta Notaris
// -----------------------------------------------------------------------------------------------------------
    public function uploadAktaNotaris($id){

        if (!$this->akta_notaris_doc) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
                'akta_notaris_doc' => 'mimes:pdf|max:4096',
            ]);
            $file = $this->akta_notaris_doc;
            $nama_file =
            $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'Dokumen-Akta-Notaris';
            $data = $nama_file.'.'.$file->extension();
            $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);
            
            $document = Document::find($id); 
            $document->akta_notaris_doc = $data;
            $document->status_akta_notaris_doc = 1;
            $document->save();
    
            return back();
        }
    }

    public function updateAktaNotaris($id){
        // dd($this->akta_notaris_doc);
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
        if(asset($filename)){
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
    public function uploadSIUP($id){
        if (!$this->siup_doc) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
                'siup_doc' => 'mimes:pdf|max:4096',
            ]);

            $file = $this->siup_doc;
            $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'SIUP';
            $data = $nama_file.'.'.$file->extension();
            $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);
            
            $document = Document::find($id); 
            $document->siup_doc = $data;
            $document->status_siup_doc = 1;
            $document->save();
    
            return back();
        }
    }

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
                if(asset($filename)){
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
    public function uploadTDP($id){
        if (!$this->tdp_doc) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
                'tdp_doc' => 'mimes:pdf|max:4096',
            ]);

            $file = $this->tdp_doc;
            $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'TDP';
            $data = $nama_file.'.'.$file->extension();
            $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);
            
            $document = Document::find($id); 
            $document->tdp_doc = $data;
            $document->status_tdp_doc = 1;
            $document->save();
    
            return back();
        }

    }
    
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
            if(asset($filename)){
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
    public function uploadNPWP($id){
        if (!$this->npwp_doc) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else{
            $this->validate([
                'npwp_doc' => 'mimes:pdf|max:4096',
            ]);

            $file = $this->npwp_doc;
            $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'NPWP';
            $data = $nama_file.'.'.$file->extension();
            $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);
            
            $document = Document::find($id); 
            $document->npwp_doc = $data;
            $document->status_npwp_doc = 1;
            $document->save();
            
            return back();
        }
    }

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
        if(asset($filename)){
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
    public function uploadAPI($id){
        if (!$this->api_doc) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
                ]);
            } else {
                $this->validate([
                'api_doc' => 'mimes:pdf|max:4096',
            ]);
            $file = $this->api_doc;
            $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'API';
            $data = $nama_file.'.'.$file->extension();
            $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);
            
            $document = Document::find($id); 
            $document->api_doc = $data;
            $document->status_api_doc = 1;
            $document->save();
            
            return back();
        }
    }
    
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
            if(asset($filename)){
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
    public function uploadDaftarMerk($id){
        if (!$this->daftar_merk_doc) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
                'daftar_merk_doc' => 'mimes:pdf|max:4096',
            ]);

            $file = $this->daftar_merk_doc;
            $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'Daftar-Merk';
            $data = $nama_file.'.'.$file->extension();
            $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);
            
            $document = Document::find($id); 
            $document->daftar_merk_doc = $data;
            $document->status_daftar_merk_doc = 1;
            $document->save();
            
            return back();
        }
    }

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
        if(asset($filename)){
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
    public function uploadSDSProduk($id){
        if (!$this->sds_produk_doc) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
                'sds_produk_doc' => 'mimes:pdf|max:4096',
            ]);
            $file = $this->sds_produk_doc;
            $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'SDS-Produk';
            $data = $nama_file.'.'.$file->extension();
            $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);
            
            $document = Document::find($id); 
            $document->sds_produk_doc = $data;
            $document->status_sds_produk_doc = 1;
            $document->save();
            
            return back();
        }
    }

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
            
            if(asset($filename)){
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
    public function uploadMaterialBill($id){
        if (!$this->material_bill_doc) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
                'material_bill_doc' => 'mimes:pdf|max:4096',
            ]);
            $file = $this->material_bill_doc;
            $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'Material-Bill';
            $data = $nama_file.'.'.$file->extension();
            $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);
            
            $document = Document::find($id); 
            $document->material_bill_doc = $data;
            $document->status_material_bill_doc = 1;
            $document->save();
            
            return back();
        }
    }

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

        if(asset($filename)){
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
    public function uploadSDSMaterial($id){
        if (!$this->sds_material_doc) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'File tidak Ada!'
            ]);
        } else {
            $this->validate([
                'sds_material_doc' => 'mimes:pdf|max:4096',
            ]);
            $file = $this->sds_material_doc;
            $nama_file = $this->company->nama_perusahaan.'-'.$this->document->produk->nama_produk.'-'.'SDS-Material';
            $data = $nama_file.'.'.$file->extension();
            $file->storeAs('checklist-dokumen/'. $this->company->nama_perusahaan, $data);
            
            $document = Document::find($id); 
            $document->sds_material_doc = $data;
            $document->status_sds_material_doc = 1;
            $document->save();
    
            return back();
        }
    }

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

        if(asset($filename)){
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
