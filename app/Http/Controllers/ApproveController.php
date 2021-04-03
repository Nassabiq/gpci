<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ApproveController extends Controller
{
    //
    public function approveDokumen(){
        return view('client/approve-dokumen');
    }
    public function approveSertifikasi(){
        $products = Product::with('pabrik.perusahaan')->get();
        return view('client/approve-sertifikasi', compact('products'));
    }

    public function detailSertifikasi($id)
    {
        $product = Product::with('pabrik.perusahaan')->find($id);
        return view('client/detail-approve-sertifikasi', compact('product'));
    }
}
