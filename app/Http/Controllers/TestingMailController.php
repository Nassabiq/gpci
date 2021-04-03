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
        $id_user = Auth::user()->id;
        $company = Company::where('user_id', $id_user)->with('factories.produk.document')->first();
        Mail::to("nasirudin.sabiq16@mhs.uinjkt.ac.id")->send(new PendaftaranSertifikasi($company));
        return "Email telah dikirim";
    }
}
