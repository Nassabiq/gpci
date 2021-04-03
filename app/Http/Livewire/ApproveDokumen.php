<?php

namespace App\Http\Livewire;

use App\Company;
use App\Document;
use App\Factory;
use App\Product;
use Livewire\Component;

class ApproveDokumen extends Component
{   
    public $companies, $perusahaan, $factories, $products, $document;
    public $selectedCompany, $selectedFactory, $selectedProduct = null;
    
    public $akta_notaris_doc, $siup_doc, $tdp_doc , $npwp_doc, $api_doc, $daftar_merk_doc, $sds_produk_doc,
    $material_bill_doc, $sds_material_doc;
    
    public $ket_akta_notaris_doc, $ket_siup_doc, $ket_tdp_doc , $ket_npwp_doc, $ket_api_doc, $ket_daftar_merk_doc,
    $ket_sds_produk_doc, $ket_material_bill_doc, $ket_sds_material_doc;

    public function mount(){
        $this->companies = Company::with('factories.produk.document')->get();
        $this->factories = collect();
        $this->products = collect();
    }
    public function render()
    {
        $kantor = $this->selectedCompany;
        $this->perusahaan = Company::where('id' , $kantor)->find($kantor);
        $produk = $this->selectedProduct;
        $this->document = Document::where('product_id' , $produk)->find($produk);
        return view('livewire.approve-dokumen');
    }
    public function updatedSelectedCompany($id)
    {
        if (!is_null($id)) {
            $this->factories = Factory::where('company_id', $id)->get();
        }
    }
    public function updatedSelectedFactory($id)
    {
        if (!is_null($id)) {
            $this->products = Product::where('factory_id', $id)->get();
        }
    }
    // public function updatedSelectedProduct($id)
    // {
    //     if (!is_null($id)) {
    //         $this->documents = Document::where('product_id' , $id)->find($id);
    //     }
    // }

    public function approveAktaNotaris($id, $name){
        $document = Document::find($id);
        $document->status_akta_notaris_doc = 2;
        $document->save();

        $this->emit('hideModal');
    }
    public function ketAktaNotaris($id)
    {
        $document = Document::find($id);
        $document->ket_akta_notaris_doc = $this->ket_akta_notaris_doc;
        $document->save();

        $this->emit('hideModal');
    }


    public function approveSIUP($id){
        $document = Document::find($id);
        $document->status_siup_doc = 2;
        $document->save();

        $this->emit('hideModal');
    }
    public function ketSIUP($id)
    {
        $document = Document::find($id);
        $document->ket_siup_doc = $this->ket_siup_doc;
        $document->save();

        $this->emit('hideModal');
    }


    public function approveTDP($id){
        $document = Document::find($id);
        $document->status_tdp_doc = 2;
        $document->save();

        $this->emit('hideModal');
    }
    public function ketTDP($id)
    {
        $document = Document::find($id);
        $document->ket_tdp_doc = $this->ket_tdp_doc;
        $document->save();

        $this->emit('hideModal');
    }



    public function approveNPWP($id){
        $document = Document::find($id);
        $document->status_npwp_doc = 2;
        $document->save();

        $this->emit('hideModal');
    }
    public function ketNPWP($id)
    {
        $document = Document::find($id);
        $document->ket_npwp_doc = $this->ket_npwp_doc;
        $document->save();

        $this->emit('hideModal');
    }


    public function approveAPI($id){
        $document = Document::find($id);
        $document->status_api_doc = 2;
        $document->save();

        $this->emit('hideModal');
    }
    public function ketAPI($id)
    {
        $document = Document::find($id);
        $document->ket_api_doc = $this->ket_api_doc;
        $document->save();

        $this->emit('hideModal');
    }

    public function approveDaftarMerk($id){
        $document = Document::find($id);
        $document->status_daftar_merk_doc = 2;
        $document->save();

        $this->emit('hideModal');
    }
    public function ketDaftarMerk($id)
    {
        $document = Document::find($id);
        $document->ket_daftar_merk_doc = $this->ket_daftar_merk_doc;
        $document->save();

        $this->emit('hideModal');
    }


    public function approveSDSProduk($id){
        $document = Document::find($id);
        $document->status_sds_produk_doc = 2;
        $document->save();

        $this->emit('hideModal');
    }
    public function ketSDSProduk($id)
    {
        $document = Document::find($id);
        $document->ket_sds_produk_doc = $this->ket_sds_produk_doc;
        $document->save();

        $this->emit('hideModal');
    }


    public function approveMaterialBill($id){
        $document = Document::find($id);
        $document->status_material_bill_doc = 2;
        $document->save();

        $this->emit('hideModal');
    }
    public function ketMaterialBill($id)
    {
        $document = Document::find($id);
        $document->ket_material_bill_doc = $this->ket_material_bill_doc;
        $document->save();

        $this->emit('hideModal');
    }
    
    public function approveSDSMaterial($id){
        $document = Document::find($id);
        $document->status_sds_material_doc = 2;
        $document->save();

        $this->emit('hideModal');
    }
    public function ketSDSMaterial($id)
    {
        $document = Document::find($id);
        $document->ket_sds_material_doc = $this->ket_sds_material_doc;
        $document->save();

        $this->emit('hideModal');
    }
}
