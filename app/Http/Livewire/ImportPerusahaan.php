<?php

namespace App\Http\Livewire;

use App\Company;
use Livewire\Component;
use Illuminate\Support\Str;

class ImportPerusahaan extends Component
{
    public $nama_perusahaan, $alamat_perusahaan, $email_perusahaan, $no_telp_perusahaan, $fax_perusahaan,
    $kodepos_perusahaan, $no_akta_notaris, $no_siup, $no_tdp, $no_npwp, $no_api, $sertifikasi_ekolabel,
    $lembaga_ekolabel, $website_perusahaan, $contact;

    public $nama, $jabatan, $no_hp, $email, $no_telp, $fax;
    public $nama2, $jabatan2, $no_hp2, $email2, $no_telp2, $fax2;

    public function render()
    {
        return view('livewire.import-perusahaan');
    }

    public function uploadPerusahaan(){
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

            'nama' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
        ], $messages);

        $contact_perusahaan = [
            "cp_1" => [
                'nama' => $this->nama,
                'jabatan' => $this->jabatan,
                'no_hp' => $this->no_hp,
                'email' => $this->email,
                'no_telp' => $this->no_telp,
                'fax' => $this->fax,
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
            'slug' => Str::slug($this->nama_perusahaan),
            'alamat_perusahaan' => $this->alamat_perusahaan,
            'email_perusahaan' => $this->email_perusahaan,
            'no_telp_perusahaan' => $this->no_telp_perusahaan,
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
            'user_id' => 0,
        ]);

        toast('Import Data Sertifikasi Berhasil!','success');
        // toastr()->success('Import Data Sertifikasi Berhasil!');
        return redirect('/import/data-sertifikasi');
    }
}
