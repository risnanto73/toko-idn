<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index(){
        if (auth()->user()->role !== 'Admin') {
            abort(403);
            // echo "Terlarang";
            // return;
        }

        $i = 1;
        $title = "ListView Kategori";
        $kategori = Kategori::orderBy('id', 'desc')->paginate(5);
        return view('kategori.index', [
            'title' => $title,
            'kategori' => $kategori,
            'i' => $i
        ]);
    }

    public function addKategori(Request $request){
        // return dd($request);
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug'  => Str::slug($request->nama_kategori,'-')
        ]);
        return redirect()->back();
    }

    public function updateKategori(Request $request, $id){
        $kategori = Kategori::find($id);
        $kategori->update([
                'nama_kategori' => $request->nama_kategori,
                'slug'  => Str::slug($request->nama_kategori,'-')
            ]);
            return redirect()->back();
        
    }

    public function deleteKategori($id)
    {
        //KEtika Hapu data gambar di storage ke apus
        // Kategori::where('id', $id)->first();
        Kategori::findOrFail($id)->delete();
        return redirect()->back();
        // return redirect() -> route('produk.index')-> with('success','Data berhasil dihapus.');
    }
}
