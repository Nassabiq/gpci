<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    //
    public function index()
    {
        $products = Product::with('pabrik.perusahaan')->get();
        return view('client/penilaian-sertifikasi', compact('products'));
    }

    public function detailsProduct($id)
    {
        $product = Product::with('pabrik.perusahaan')->find($id);
        return view('client/detail-penilaian-sertifikasi', compact('product'));
    }
}
