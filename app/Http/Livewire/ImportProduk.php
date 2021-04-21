<?php

namespace App\Http\Livewire;

use App\Category;
use App\Document;
use App\Factory;
use App\Product;
use App\Rating;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class ImportProduk extends Component
{
    use WithFileUploads;
    public $kategori, $plant, $plant_id;
    public $nama_produk, $tipe_model, $ukuran, $merk_dagang, $deskripsi_produk, $tipe_pengemasan , $kategori_produk,
    $jenis_sertifikasi, $foto_produk = [];

    public function mount(){
        $this->plant = Factory::with('perusahaan')->whereHas('perusahaan' ,function ($q)
        {
            $q->where('user_id', '=', 0);
        })->get();
        $this->kategori = Category::where('id', '!=', 1)->get();
    }

    public function render()
    {
        return view('livewire.import-produk');
    }
    public function uploadProduk(){
        $pabrik = Factory::with('perusahaan')->find($this->plant_id);
        // dd($data->nama_fasilitas, $data->perusahaan->nama_perusahaan);

        // $messages = [
        // 'required' => 'kolom :attribute kosong, harap diisi',
        // 'min' => ':attribute harus diisi minimal :min karakter',
        // 'max' => ':attribute harus diisi maksimal :max karakter',
        // 'numeric' => ':attribute harus berupa angka',
        // 'unique:perusahaan' => ':attribute sudah digunakan, silahkan gunakan email yang lain'
        // ];
        // $validatedData = $this->validate([
        // 'nama_produk' => 'required',
        // 'deskripsi_produk' => 'required',
        // 'foto_produk' => 'required',
        // 'tipe_model' => 'required',
        // 'merk_dagang' => 'required',
        // 'tipe_pengemasan' => 'required',
        // 'foto_produk.*' => 'required|image|max:1024',
        // 'ukuran' => 'required',
        // ],$messages);

        $i = 1;
        foreach ($this->foto_produk as $photo) {
            $nama_file = $pabrik->perusahaan->nama_perusahaan.'-'.$pabrik->nama_fasilitas.'-'.$this->nama_produk;
            $data = $nama_file."-".$i++.".".$photo->extension();
            $photo->storeAs('foto_produk/'. $pabrik->perusahaan->nama_perusahaan, $data);
            $photodata[] = $data;
        }
        // Produk
        $produk = Product::create([
            'nama_produk' => $this->nama_produk,
            'deskripsi_produk' => $this->deskripsi_produk,
            'tipe_model' => $this->tipe_model,
            'merk_dagang' => $this->merk_dagang,
            'tipe_pengemasan' => $this->tipe_pengemasan,
            'ukuran' => $this->ukuran,
            'category_id' => $this->kategori_produk,
            'jenis_sertifikasi' => $this->jenis_sertifikasi,
            'tgl_pendaftaran' => date('Y-m-d H:i:s'),
            'foto_produk' => json_encode($photodata, 128),
            'factory_id' => $this->plant_id,
            'status' => 1
        ]);
        $document = Document::get()->whereIn('category_id' , array($this->kategori_produk, 100));
        for ($i=0; $i < count($document); $i++) {
            if (isset($document[$i]->id)) {
                # code...
                $produk->document()->attach($document[$i]->id, ['status' => 0]);
            }
        }
        $this->nextForm($produk->id);
    }
    public function nextForm($id){

        Rating::create([
            'product_id' => $id
        ]);

        toast('Import Data Sertifikasi Berhasil!','success');
        return redirect('/import/data-sertifikasi');
    }
}
