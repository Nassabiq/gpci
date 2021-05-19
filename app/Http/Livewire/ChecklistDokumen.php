<?php

namespace App\Http\Livewire;

use App\Category;
use App\Document;
use Livewire\Component;

class ChecklistDokumen extends Component
{
    public $docs, $doc_id, $categories, $kategori;
    public $nama_dokumen, $kategori_input;

    public $updateMode = false;

    public function mount(){
        $this->categories = Category::get();
    }
    public function render()
    {
        $this->docs = Document::with('produk', 'kategoriProduk')->where('category_id', $this->kategori)->get();
        return view('livewire.checklist-dokumen');
    }

    public function resetInput(){
        $this->nama_dokumen =  null;
        $this->kategori_input = null;
    }

    public function add(){
        $this->updateMode = false;
        $this->dispatchBrowserEvent('show-modal');
    }

    public function close(){
        $this->dispatchBrowserEvent('hide-modal');
        $this->resetInput();
        $this->updateMode = false;
    }

    public function addDokumen(){
        $this->validate([
            'nama_dokumen' => 'required',
            'kategori_input' => 'required'
        ], 
        [
            'nama_dokumen.required' => 'Form ini harus diisi',
            'kategori_input.required' => 'Pilih Kategori Dokumen'
        ]);

        Document::create([
            'nama_dokumen' => $this->nama_dokumen,
            'category_id' => $this->kategori_input
        ]);
        
        $this->dispatchBrowserEvent('show-toast', [
            'type' => 'success',
            'message' => 'Checklist Dokumen Berhasil Ditambahkan!'
        ]);
        $this->resetInput();
    }

    public function edit(Document $doc){
        // dd($doc);
        $this->updateMode = true;
        $this->doc_id = $doc->id;
        $this->nama_dokumen = $doc->nama_dokumen;
        $this->dispatchBrowserEvent('show-modal',[
            'message' => 'File tidak Ada!'
        ]);
    }

    public function editDokumen(){
        $this->validate([
            'nama_dokumen' => 'required',
            'kategori_input' => 'required'
        ],
        [
            'nama_dokumen.required' => 'Form ini harus diisi',
            'kategori_input.required' => 'Pilih Kategori Dokumen'
        ]);
        
        if ($this->doc_id) {
            $docs = Document::find($this->doc_id);
            $docs->update([
                'nama_dokumen' => $this->nama_dokumen,
                'category_id' => $this->kategori_input
            ]);

            $this->dispatchBrowserEvent('show-toast',[
                'type' => 'success',
                'message' => 'Checklist Dokumen Berhasil Diubah!'
            ]);
            $this->resetInput();
        }
    }

    public function delete($id){
        $docs = Document::find($id);
        $docs->delete();
        $this->dispatchBrowserEvent('show-toast',[
            'type' => 'success',
            'message' => 'Checklist Dokumen Berhasil Dihapus!'
        ]);
    }   
}
