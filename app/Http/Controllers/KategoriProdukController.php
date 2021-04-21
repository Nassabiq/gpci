<?php

namespace App\Http\Controllers;

use App\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    //
    public function index(){
        $categories =  Category::paginate(10);
        return view('client.add-kategori-produk', compact('categories'));
    }

    public function store(Request $request){
        // dd($request);

        $request->validate([
            'categories' => 'required'
        ],
        [
            'required' => 'form harus diisi'
        ]);

        $category = Category::create([
            'categories' => $request->categories
        ]);
        
        toast('Data Berhasil Ditambahkan!','success');
        return redirect()->route('add-kategori-produk');
    }

    public function edit(Request $request, $id){
        $request->validate([
            'categories' => 'required'
        ],
        [
            'required' => 'form harus diisi'
            ]);
            
        $category = Category::find($id);
        $category->categories = $request->categories;
        $category->save();

        toast('Data Berhasil Diubah!','success');
        return redirect()->route('add-kategori-produk');
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        toast('Data Berhasil Dihapus!','success');
        return redirect()->route('add-kategori-produk');
    }
}
