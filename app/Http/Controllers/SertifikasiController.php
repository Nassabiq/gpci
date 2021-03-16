<?php

namespace App\Http\Controllers;

use App\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SertifikasiController extends Controller
{
    public function __construct()
    {
        
    }
    public function showDataSertifikasi(Request $request){
        $id_user = Auth::user()->id;
        $company = Company::where('user_id', $id_user)->with('factories.produk.document')->first();
        return view('client/data-sertifikasi', compact('company', 'request'));
    }

    public function addSertifikasi(Request $request){
        $id_user = Auth::user()->id;
        $company = Company::where('user_id', $id_user)->with('factories.produk.document')->first();

        if ($company) {
            return view('client/add-plant');
        }else{
            return view('client/add-sertifikasi');
        }
    }

    public function addPlant(){
        return view('client/add-plant');
    }
    public function addProduk(){
        return view('client/add-produk');
    } 
}
