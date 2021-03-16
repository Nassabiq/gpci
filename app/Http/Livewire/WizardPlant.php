<?php

namespace App\Http\Livewire;

use App\Company;
use Livewire\Component;
use App\Category;
use App\Document;
use App\Factory;
use App\Product;
use App\Rating;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class WizardPlant extends Component
{   
    use WithFileUploads;
    public $kategori;
    public $company;

    public $currentStep = 1;
    public $n;
    
    public $nama_fasilitas, $email_fasilitas, $alamat_fasilitas, $kodepos_fasilitas, $no_telp_fasilitas, $fax_fasilitas;
    
    public $nama_produk, $tipe_model, $ukuran, $merk_dagang, $deskripsi_produk, $tipe_pengemasan ,
    $kategori_produk, $jenis_sertifikasi, $foto_produk = [];

    public $nama2, $jabatan2, $no_hp2, $email2, $no_telp2, $fax2;
    public $nama3, $jabatan3, $no_hp3, $email3, $no_telp3, $fax3;

    public function mount(){
        $this->kategori = Category::get();

        $id_user = Auth::user()->id;
        $this->company = Company::where('user_id', $id_user)->with('factories.produk.document')->first();
    }
    public function render()
    {   
        return view('livewire.wizard-plant');
    }

    public function firstStepSubmit(){
        // $messages = [
        //     'required' => 'kolom :attribute kosong, harap diisi',
        //     'min' => ':attribute harus diisi minimal :min karakter',
        //     'max' => ':attribute harus diisi maksimal :max karakter',
        //     'numeric' => ':attribute harus berupa angka',
        //     'unique:perusahaan' => ':attribute sudah digunakan, silahkan gunakan email yang lain'
        // ];
        // $validatedData = $this->validate([
        //     'nama_fasilitas' => 'required',
        //     'email_fasilitas' => 'required|unique:fasilitas_produksi|email',
        //     'alamat_fasilitas' => 'required',
        //     'kodepos_fasilitas' => 'required|numeric',
        //     'no_telp_fasilitas' => 'required',
        //     'fax_fasilitas' => 'required',

        //     'nama2' => 'required',
        //     'jabatan2' => 'required',
        //     'no_hp2' => 'required',
        //     'email2' => 'required|email',
        //     'no_telp2' => 'required',
        //     'fax2' => 'required',

        // ],$messages);
        $this->currentStep = 2;
    }
    public function secondStepSubmit(){
        // $messages = [
        //     'required' => 'kolom :attribute kosong, harap diisi',
        //     'min' => ':attribute harus diisi minimal :min karakter',
        //     'max' => ':attribute harus diisi maksimal :max karakter',
        //     'numeric' => ':attribute harus berupa angka',
        //     'unique:perusahaan' => ':attribute sudah digunakan, silahkan gunakan email yang lain'
        // ];
        // $validatedData = $this->validate([
        //     'nama_produk' => 'required',
        //     'deskripsi_produk' => 'required',
        //     'foto_produk' => 'required',
        //     'tipe_model' => 'required',
        //     'merk_dagang' => 'required',
        //     'tipe_pengemasan' => 'required',
        //     'foto_produk.*' => 'required|image|max:1024',
        //     'ukuran' => 'required',
        // ],$messages);
        
        $this->currentStep = 3;
    }

    public function submitForm(){
        $company = $this->company;

        $contact_pabrik = [
            'nama' => $this->nama3,
            'jabatan' => $this->jabatan3,
            'no_hp' => $this->no_hp3,
            'email' => $this->email3,
            'no_telp' => $this->no_telp3,
            'fax' => $this->fax3
        ];
        
        $factory = Factory::create([
            'nama_fasilitas' => $this->nama_fasilitas,
            'email_fasilitas' => $this->email_fasilitas,
            'alamat_fasilitas' => $this->alamat_fasilitas,
            'kodepos_fasilitas' => $this->kodepos_fasilitas,
            'no_telp_fasilitas' => $this->no_telp_fasilitas,
            'fax_fasilitas' => $this->fax_fasilitas,
            'contact' => json_encode($contact_pabrik, 128),
            'company_id' => $company->id
        ]);

        
        $this->nextSubmitFirstForm($factory->id);
        
    }
    
    public function nextSubmitFirstForm($id){
        // Fasprod
        $i = 1;
        $company = $this->company;
        foreach ($this->foto_produk as $photo) {
            $nama_file = $company->nama_perusahaan.'-'.$this->nama_fasilitas.'-'.$this->nama_produk;
            $data = $nama_file."-".$i++.".".$photo->extension();
            $photo->storeAs('foto_produk/'.$company->nama_perusahaan, $data);
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
            'tgl_pendaftaran' => Carbon::now(),
            'foto_produk' => json_encode($photodata, 128),
            'factory_id' => $id,
            'status' => 1
        ]);
        $this->nextSubmitSecondForm($produk->id);
    }
    public function nextSubmitSecondForm($id){
        Document::create([
            'product_id' => $id
        ]);
        Rating::create([
            'product_id' => $id
        ]);
        session()->flash('success', 'Pendaftaran Berhasil');
        return redirect('/home');
    }

    public function back($step){
        $this->currentStep = $step;
    }
}
