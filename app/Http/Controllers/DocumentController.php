<?php

namespace App\Http\Controllers;

use App\Company;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function index(){
        $id_user = Auth::user()->id;
        $company = Company::with('factories.produk.document')->where('user_id' , $id_user)->find($id_user);
        if ($company) {
            return view('client/dokumen-sertifikasi', compact('company'));
        }else{
            return redirect()->route('home')->with('jsAlert' , 'Data Sertifikasi tidak ada!!');
        }
    }
}
