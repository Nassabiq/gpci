<?php

namespace App\Http\Livewire;

use App\Company;
use App\Factory;
use Illuminate\Support\Str;
use Livewire\Component;

class ImportPlant extends Component
{
    public $nama_fasilitas, $email_fasilitas, $alamat_fasilitas, $kodepos_fasilitas, $no_telp_fasilitas, $fax_fasilitas;
    public $nama3, $jabatan3, $no_hp3, $email3, $no_telp3, $fax3;
    public $company, $company_id;

    public function mount(){
        $this->company = Company::where('user_id', '=' ,0)->get();
    }
    public function render()
    {
        return view('livewire.import-plant');
    }
    public function uploadPlant(){
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

            'nama3' => 'required',
            'jabatan3' => 'required',
            'no_hp3' => 'required',
            'email3' => 'required|email',
            'no_telp3' => 'required',

        ],$messages);
        
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
            'slug' => Str::slug($this->nama_fasilitas),
            'email_fasilitas' => $this->email_fasilitas,
            'alamat_fasilitas' => $this->alamat_fasilitas,
            'kodepos_fasilitas' => $this->kodepos_fasilitas,
            'no_telp_fasilitas' => $this->no_telp_fasilitas,
            'fax_fasilitas' => $this->fax_fasilitas,
            'contact' => json_encode($contact_pabrik, 128),
            'company_id' => $this->company_id
        ]);
        toast('Import Data Sertifikasi Berhasil!','success');
        // toastr()->success('Import Data Sertifikasi Berhasil!');
        return redirect('/import/data-sertifikasi');
    }
}
