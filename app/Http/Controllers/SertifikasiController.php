<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

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
    
    public function showAllDataSertifikasi(){
        $company = Company::with('factories.produk.document')->paginate(5);
        return view('client/all-data-sertifikasi', compact('company'));
    }

    public function showSelectedDataSertifikasi($id)
    {
        $company = Company::with('factories.produk.document')->findOrFail($id);
        return view('client/detail-data-sertifikasi', compact('company'));
    }
    public function cetak_pdf($id, Request $request)
    {
        $produk = Product::with('pabrik.perusahaan', 'kategoriProduk')->find($id);
        $company = Company::with('factories.produk.document')->get();
        $kategori = Category::with('kategoriProduk')->get();
        return view('sertifikatgold' , compact('produk', 'kategori', 'company'));
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
