<?php

namespace App\Http\Controllers;

use App\Company;
use App\Mail\PendaftaranSertifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TestingMailController extends Controller
{
    public function index(){
        // $id_user = Auth::user()->id;
        $company = Company::find(1);
        // $company = Company::where('user_id', $id_user)->with('factories.produk.document')->first();
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('email', ['nama' => $company->nama_perusahaan ], function($message){
            $message
            ->from('bar@example.com')
            ->to('nasirudin.sabiq16@mhs.uinjkt.ac.id')
            ->subject('Welcome!');
        });

        return 'berhasil';
    }
}
