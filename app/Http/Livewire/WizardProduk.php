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
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WizardProduk extends Component
{   
    use WithFileUploads;
    public $kategori;
    public $company;

    public $currentStep = 1;
    public $n;
    
    public $nama_pabrik, $nama_produk, $tipe_model, $ukuran, $merk_dagang, $deskripsi_produk, $tipe_pengemasan ,
    $kategori_produk, $jenis_sertifikasi, $foto_produk = [];

    public function mount(){
        $this->kategori = Category::where('id', '!=', 1)->get();

        $id_user = Auth::user()->id;
        $this->company = Company::where('user_id', $id_user)->with('factories.produk.document')->first();
    }
    public function render()
    {   
        return view('livewire.wizard-produk');
    }

    public function firstStepSubmit(){
        $messages = [
            'required' => 'kolom :attribute kosong, harap diisi',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique:perusahaan' => ':attribute sudah digunakan, silahkan gunakan email yang lain'
        ];
        $validatedData = $this->validate([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'foto_produk' => 'required',
            'tipe_model' => 'required',
            'merk_dagang' => 'required',
            'tipe_pengemasan' => 'required',
            'foto_produk.*' => 'required|image|max:4096',
            'ukuran' => 'required',
        ],$messages);
        
        $this->currentStep = 2;
    }

    public function submitForm(){

         // Fasprod
         $i = 1;
         $company = $this->company;
         foreach ($this->foto_produk as $photo) {
            $nama_file = $company->nama_perusahaan.'-'.$this->nama_pabrik.'-'.$this->nama_produk;
            $data = $nama_file."-".$i++.".".$photo->extension();
            $photo->storeAs('foto_produk/'.$company->nama_perusahaan, $data);
            $photodata[] = $data;
         }
         // Produk
         $produk = Product::create([
            'nama_produk' => $this->nama_produk,
            'slug' => Str::slug($this->nama_produk),
            'deskripsi_produk' => $this->deskripsi_produk,
            'tipe_model' => $this->tipe_model,
            'merk_dagang' => $this->merk_dagang,
            'tipe_pengemasan' => $this->tipe_pengemasan,
            'ukuran' => $this->ukuran,
            'category_id' => $this->kategori_produk,
            'jenis_sertifikasi' => $this->jenis_sertifikasi,
            'tgl_pendaftaran' => date('Y-m-d H:i:s'),
            'foto_produk' => json_encode($photodata, 128),
            'factory_id' => $this->nama_pabrik,
            'status' => 1
         ]);

        $document = Document::get()->whereIn('category_id' , array($this->kategori_produk, 1));

        foreach ($document as $doc) {
            if (isset($doc)) {
                $produk->document()->attach($doc->id, ['status' => 0]);
            }
        }
        
        $this->nextSubmitFirstForm($produk->id);
         
    }

    public function nextSubmitFirstForm($id){
        Rating::create([
            'product_id' => $id
        ]);
        $company = $this->company;
        
        // Local
        
        // Mail::to("nasirudin.sabiq16@mhs.uinjkt.ac.id")->send(new PendaftaranSertifikasi($company->nama_perusahaan, $this->nama_produk));
        // Mail::to("nasirudin.sabiq16@mhs.uinjkt.ac.id")->send(new EmailSertifikasi($company->nama_perusahaan, $this->nama_produk));
        
        // Production
        
        Mail::to([$company->email_perusahaan, Auth::user()->email])->send(new PendaftaranSertifikasi($company->nama_perusahaan, $this->nama_produk));
        Mail::to(['info@gpci.or.id', 'ketut.putra@iapmoindonesia.org', 'rista.dianameci@iapmoindonesia.org','dahlan@gpci.or.id'])->send(new EmailSertifikasi($company->nama_perusahaan, $this->nama_produk));
        
        // toast('Pendaftaran Sertifikasi Berhasil!','success');
        toastr()->success('Pendaftaran Sertifikasi Berhasil!');
        return redirect('/home');

    }

    public function back($step){
        $this->currentStep = $step;
    }
}
