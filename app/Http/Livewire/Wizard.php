<?php

namespace App\Http\Livewire;

use App\Company;
use Livewire\Component;
use App\Category;
use App\Document;
use App\Factory;
use App\Mail\EmailSertifikasi;
use App\Mail\PendaftaranSertifikasi;
use App\Product;
use App\Rating;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Wizard extends Component
{   
    use WithFileUploads;
    public $kategori;
    public $company;

    public $currentStep = 1;
    public $successMessage = '';
    public $n;
    
    public $nama_perusahaan, $alamat_perusahaan, $email_perusahaan, $no_telp_perusahaan, $fax_perusahaan, $kodepos_perusahaan, $no_akta_notaris, $no_siup, $no_tdp, $no_npwp, $no_api, $sertifikasi_ekolabel, $lembaga_ekolabel, $website_perusahaan, $contact;
    
    public $nama_fasilitas, $email_fasilitas, $alamat_fasilitas, $kodepos_fasilitas, $no_telp_fasilitas, $fax_fasilitas;
    
    public $nama_produk, $tipe_model, $ukuran, $merk_dagang, $deskripsi_produk, $tipe_pengemasan , $kategori_produk,
    $jenis_sertifikasi, $foto_produk = [];

    public $nama1, $jabatan1, $no_hp1, $email1, $no_telp1, $fax1;
    public $nama2, $jabatan2, $no_hp2, $email2, $no_telp2, $fax2;
    public $nama3, $jabatan3, $no_hp3, $email3, $no_telp3, $fax3;

    public function mount(){
        $this->kategori = Category::where('id', '!=', 1)->get();

        $id_user = Auth::user()->id;
        $this->company = Company::where('user_id', $id_user)->with('factories.produk.document')->first();
    }
    public function render()
    {   
        return view('livewire.wizard');
    }

    public function firstStepSubmit(){
        $messages = [
            'required' => 'kolom :attribute kosong, harap diisi',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique:companies' => ':attribute sudah digunakan, silahkan gunakan email yang lain'  
        ];
        $validatedData = $this->validate([
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'email_perusahaan' => 'required|unique:companies|email',
            'no_telp_perusahaan' => 'required',
            'fax_perusahaan' => 'required',
            'kodepos_perusahaan' => 'required|numeric',
            'no_akta_notaris' => 'required',
            'no_siup' => 'required',
            'no_tdp' => 'required',
            'no_npwp' => 'required',
            'no_api' => 'required',
            'sertifikasi_ekolabel' => 'nullable',
            'lembaga_ekolabel' => 'nullable',
            'website_perusahaan' => 'required',

            'nama1' => 'required',
            'jabatan1' => 'required',
            'no_hp1' => 'required',
            'email1' => 'required|email',
            'no_telp1' => 'required',
            'fax1' => 'required',
        ], $messages);

        $this->currentStep = 2;
    }
    public function secondStepSubmit(){
        $messages = [
            'required' => 'kolom :attribute kosong, harap diisi',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique:factories' => ':attribute sudah digunakan, silahkan gunakan email yang lain'
        ];
        $validatedData = $this->validate([
            'nama_fasilitas' => 'required',
            'email_fasilitas' => 'required|unique:factories|email',
            'alamat_fasilitas' => 'required',
            'kodepos_fasilitas' => 'required|numeric',
            'no_telp_fasilitas' => 'required',
            'fax_fasilitas' => 'required',

            'nama3' => 'required',
            'jabatan3' => 'required',
            'no_hp3' => 'required',
            'email3' => 'required|email',
            'no_telp3' => 'required',
            'fax3' => 'required',

        ],$messages);
        $this->currentStep = 3;
    }
    public function thirdStepSubmit(){
        $messages = [
            'required' => 'kolom :attribute kosong, harap diisi',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
        ];
        $validatedData = $this->validate([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'foto_produk' => 'required',
            'tipe_model' => 'required',
            'merk_dagang' => 'required',
            'tipe_pengemasan' => 'required',
            'foto_produk.*' => 'required|image|max:1024',
            'ukuran' => 'required',
        ],$messages);

        $this->currentStep = 4;
    }

    public function submitForm(){
        
        // Company
        $id_user = Auth::user()->id;
        $contact_perusahaan = [
            "cp_1" => [
                'nama' => $this->nama1, 
                'jabatan' => $this->jabatan1, 
                'no_hp' => $this->no_hp1, 
                'email' => $this->email1, 
                'no_telp' => $this->no_telp1,
                'fax' => $this->fax1,
            ],
            'cp_2' => [
                'nama2' => $this->nama2, 
                'jabatan2' => $this->jabatan2, 
                'no_hp2' => $this->no_hp2, 
                'email2' => $this->email2, 
                'no_telp2' => $this->no_telp2,
                'fax2' => $this->fax2,
            ]
        ];

        $company = Company::create([
            'nama_perusahaan' => $this->nama_perusahaan,
            'alamat_perusahaan' => $this->alamat_perusahaan,
            'email_perusahaan' => $this->email_perusahaan,
            'no_telp_perusahaan' => $this->no_telp_perusahaan,
            'fax_perusahaan' => $this->fax_perusahaan, 
            'kodepos_perusahaan' => $this->kodepos_perusahaan,
            'no_akta_notaris' => $this->no_akta_notaris,
            'no_siup' => $this->no_siup,
            'no_tdp' => $this->no_tdp,
            'no_npwp' => $this->no_npwp,
            'no_api' => $this->no_api,
            'sertifikasi_ekolabel' => $this->sertifikasi_ekolabel,
            'lembaga_ekolabel' => $this->lembaga_ekolabel,
            'website_perusahaan' => $this->website_perusahaan,
            'contact' => json_encode( $contact_perusahaan, 128),
            'user_id' => $id_user,

        ]);
        $this->nextSubmitFirstForm($company->id);
        
    }
    
    public function nextSubmitFirstForm($id){
        // Fasprod
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
            'company_id' => $id
        ]);
        $this->nextSubmitSecondForm($factory->id);
    }
    
    public function nextSubmitSecondForm($id){
        $i = 1;
        foreach ($this->foto_produk as $photo) {
            $nama_file = $this->nama_perusahaan.'-'.$this->nama_fasilitas.'-'.$this->nama_produk;
            $data = $nama_file."-".$i++.".".$photo->extension();
            $photo->storeAs('foto_produk/'.$this->nama_perusahaan, $data);
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
            'factory_id' => $id,
            'status' => 1
        ]);

        $document = Document::get()->whereIn('category_id' , array($this->kategori_produk, 1));
        
        for ($i=0; $i < count($document); $i++) { 
            if (isset($document[$i]->id)) {
                # code...
                $produk->document()->attach($document[$i]->id, ['status' => 0]);
            }
        }
        
        $this->nextSubmitThirdForm($produk->id);
    }
    public function nextSubmitThirdForm($id){

        Rating::create([
            'product_id' => $id
        ]);
        $company = $this->company;
        Mail::to("nasirudin.sabiq16@mhs.uinjkt.ac.id")->send(new PendaftaranSertifikasi($this->nama_perusahaan, $this->nama_produk));
        Mail::to("nasirudin.sabiq16@mhs.uinjkt.ac.id")->send(new EmailSertifikasi($this->nama_perusahaan,$this->nama_produk));
        toastr()->success('Pendaftaran Sertifikasi Berhasil!');
        // toast('Pendaftaran Sertifikasi Berhasil!','success');
        return redirect('/home');
    }

    public function back($step){
        $this->currentStep = $step;
    }
}
