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
    
    public $keterangan;

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
        $this->document = Product::with('document')->find($produk);
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

    public function approve($id){
        $document = Document::with('produk')->whereHas(
            "produk", function($q){ $q->where("products.id", $this->selectedProduct); }
        )->find($id);
        foreach ($document->produk as $doc) {
            if ($doc->id == $this->selectedProduct ) {
                $doc->pivot->status = 2;
                $doc->pivot->save();
                $this->dispatchBrowserEvent('hideModal', [
                    'type' => 'error',
                    'message' => 'File tidak Ada!'
                ]);
            }
        }
        
    }
    public function addKeterangan($id)
    {
        $this->validate([
            'keterangan' => 'required',
        ]);
        $document = Document::with('produk')->whereHas(
            "produk", function($q){ $q->where("products.id", $this->selectedProduct); }
        )->find($id);
        
        foreach ($document->produk as $doc) {
            if ($doc->id == $this->selectedProduct ) {
                $doc->pivot->keterangan = $this->keterangan;
                $doc->pivot->save();
            }
        }

        $this->emit('hideModal');
    }


    
}
