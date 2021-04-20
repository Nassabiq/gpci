<?php

namespace App\Http\Controllers;

use App\Category;
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

        return redirect()->route('add-kategori-produk')->with('success', 'Data Berhasil ditambah');
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

        return redirect()->route('add-kategori-produk')->with('success', 'Data Berhasil diubah');
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('add-kategori-produk')->with('success', 'Data Berhasil dihapus');
    }
}
