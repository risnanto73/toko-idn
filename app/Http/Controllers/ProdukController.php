<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukRequest;
use App\Models\Kategori;
use Illuminate\Support\Str;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role !== 'Admin') {
            abort(403);
            // echo "Terlarang";
            // return;
        }

        $i = 1;
        $title = "ListView Produk";
        $produk = produk::orderBy('id', 'desc')->paginate(5);
        return view('produk.index', [
            'title' => $title,
            'produk' => $produk,
            'i' => $i
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role !== 'Admin'){
            abort(403);
            // echo "DILARANG!!!";
            // return;
        }
        $kategori = Kategori::all();
        $produk = Produk::all();

        return view('produk.create',[
            'produk' => $produk,
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->file('gambar'))) {
            Produk::create([
                'nama_produk' => $request->nama_produk,
                'kategori_id' => $request->kategori_id,
                'harga' => $request->harga,
                'sedia' => $request->sedia,
                'berat' => $request->berat,
                'slug' => Str::slug($request->nama_produk, '-'),
            ]);
            return redirect()->route('produk.index')->with(['success' =>'data berhasil dibuat']);
        } else {
            Produk::create([
                'nama_produk' => $request->nama_produk,
                'kategori_id' => $request->kategori_id,
                'harga' => $request->harga,
                'sedia' => $request->sedia,
                'berat' => $request->berat,
                'slug' => Str::slug($request->nama_produk, '-'),
                'gambar' => $request->file('gambar')->store('gambar-produk'),
            ]);
            return redirect()->route('produk.index')->with(['success' =>'data berhasil dibuat']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('produk.update', [
            'produk' => $produk,
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('gambar'))) {
            $produk = Produk::findOrFail($id);
            $produk->update([
                'nama_produk' => $request->nama_produk,
                'kategori_id' => $request->kategori_id,
                'harga' => $request->harga,
                'sedia' => $request->sedia,
                'slug' => Str::slug($request->nama_produk, '-'),
                'berat' => $request->berat,
                'kategori' => $request->kategori
            ]);
            return redirect()->route('produk.index')->with(['success' =>'data berhasil terupdate']);
        } else {
            $produk = Produk::findOrFail($id);
            Storage::delete($produk->gambar);
            $produk->update([
                'nama_produk' => $request->nama_produk,
                'kategori_id' => $request->kategori_id,
                'harga' => $request->harga,
                'sedia' => $request->sedia,
                'berat' => $request->berat,
                'slug' => Str::slug($request->nama_produk, '-'),
                'gambar' => $request->file('gambar')->store('gambar-produk'),
            ]);
            return redirect()->route('produk.index')->with(['success' =>'data berhasil terupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //KEtika Hapu data gambar di storage ke apus
        $produk = Produk::where('id', $id)->first();
        Storage::delete($produk->gambar);
        Produk::findOrFail($id)->delete();

        return redirect()->back();
        // return redirect() -> route('produk.index')-> with('success','Data berhasil dihapus.');
        return redirect()->route('produk.index')->with(['Failed','data berhasil dihapus']);
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $produk = Produk::where('nama_produk', 'like', "%" . $keyword . "%")->paginate(5);
        return view('produk.index', compact('produk'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
