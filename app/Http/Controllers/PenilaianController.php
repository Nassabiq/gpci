<?php

namespace App\Http\Controllers;

use App\Category;
use App\Docrating;
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

    public function angketPenilaian(){
        $categories = Category::with('kategoriAngket')->get();
        return view('client/angket-penilaian', compact('categories'));
    }
    public function inputAngketPenilaian(Request $request)
    {   
        $request->validate([
            'angket_penilaian_doc' => 'required|mimes:xlsx,xls|max:4096',
            'category_id' => 'required'
        ],
        [
            'required' => 'form harus diisi',
            'mimes' => 'file harus dalam format xlsx / excel',
            'max' => 'batas ukuran file harus kurang dari 4MB'
        ]);

        $file = $request->file('angket_penilaian_doc');
        $nama_file = 'Angket-Penilaian-'.$request->category_id;
        $data = $nama_file.'.'.$file->getClientOriginalExtension();
        $file->storeAs('template_angket/', $data);
        // dd($data);
        Docrating::create([
            'angket_penilaian_doc' => $data,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('input-angket-penilaian')->with('success', 'Data Berhasil ditambahkan');
    }
    public function editAngketPenilaian(Request $request, $id)
    {   
        $docs = Docrating::find($id);
        $request->validate([
            'angket_penilaian_doc_edit' => 'required|mimes:xlsx,xls|max:4096',
            'category_id_edit' => 'required'
        ],
        [
            'required' => 'form harus diisi',
            'mimes' => 'file harus dalam format xlsx / excel',
            'max' => 'batas ukuran file harus kurang dari 4MB'
            ]);
            
        if ($request->hasFile('angket_penilaian_doc')) {
            $filename = asset('public/storage/template_angket/'. $docs->angket_penilaian_doc);
            unlink($filename);
            $file = $request->file('angket_penilaian_doc');
            $nama_file = 'Angket-Penilaian-'.$request->category_id_edit;
            $data = $nama_file.'.'.$file->getClientOriginalExtension();
            $file->storeAs('template_angket/', $data);
            // dd($data);


            $docs->angket_penilaian_doc = $data;
            $docs->category_id = $request->category_id_edit;
            $docs->save();
            return redirect()->route('input-angket-penilaian')->with('success', 'Data Berhasil diubah');
        }
    }
}
