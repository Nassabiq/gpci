<?php

namespace App\Http\Controllers;

use App\Category;
use App\Docrating;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $product = Product::with('pabrik.perusahaan')->findOrFail($id);
        return view('client/detail-penilaian-sertifikasi', compact('product'));
    }

    public function angketPenilaian(){
        $categories = Category::with('kategoriAngket')->where('id', '!=', 1)->get();
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

        // toast('Data Berhasil ditambahkan!','success');
        toastr()->success('Data Berhasil ditambahkan!');
        return redirect()->route('input-angket-penilaian');
    }
    public function editAngketPenilaian(Request $request, $id)
    {   
        $docs = Docrating::find($id);
        $validator = Validator::make($request->all(),[
            'angket_penilaian_doc_edit' => 'required|mimes:xlsx,xls|max:4096',
            'category_id_edit' => 'required'
        ],
        [
            'required' => 'form harus diisi',
            'mimes' => 'file harus dalam format xlsx / excel',
            'max' => 'batas ukuran file harus kurang dari 4MB'
            ]);
        
        if ($validator->fails()) {

            toastr()->error('Gagal Mengubah Data!');
            // toast('Gagal Mengubah Data!','error');
            return redirect()->route('input-angket-penilaian');
        } else{
            if ($request->hasFile('angket_penilaian_doc_edit')) {
                $filename = asset('public/storage/template_angket/'. $docs->angket_penilaian_doc);
                Storage::delete($filename);
                $file = $request->file('angket_penilaian_doc_edit');
                $nama_file = 'Angket-Penilaian-'.$request->category_id_edit;
                $data = $nama_file.'.'.$file->getClientOriginalExtension();
                $file->storeAs('template_angket/', $data);
                // dd($data);
    
    
                $docs->angket_penilaian_doc = $data;
                $docs->category_id = $request->category_id_edit;
                $docs->save();
                
                toastr()->success('Data Berhasil diubah!');
                // toast('Data Berhasil diubah!','success');
                return redirect()->route('input-angket-penilaian');
            } else{
                return false;
            }
        }
    }
}
