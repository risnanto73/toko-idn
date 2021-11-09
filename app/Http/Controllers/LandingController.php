<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{

    public function index()
    {
        $title = "Home Page";
        $produk = Produk::take(8)->orderBy('id', 'desc')->get();
        $kategori = Kategori::all();
        return view('landing.yield.index', [
            'title' => $title,
            'produk' => $produk,
            'kategori' => $kategori,
        ]);
    }

    public function detailProduk($slug)
    {
        $title = "Detail Produk";
        $produk = Produk::all();
        $produk = Produk::where('slug', $slug)->first();
        return view('landing.yield.detail', [
            'title' => $title,
            'produk' => $produk,
        ]);
    }

    public function perKategori($slug)
    {
        $nm_kt = Kategori::where('slug', $slug)->first();
        $title = "Produk $nm_kt->nama_kategori";
        $produk = Produk::where('kategori_id', $nm_kt->id)->get();
        return view('landing.yield.per-kategori', [
            'produk' => $produk,
            'title' => $title,
        ]);
    }

    public function allProduk()
    {
        $title = "All Produk";
        $produk = Produk::orderBy('id', 'desc')->get();
        $kategori = Kategori::all();
        return view('landing.yield.all-produk', [
            'title' => $title,
            'produk' => $produk,
            'kategori' => $kategori,
        ]);
    }

    public function cariProduk()
    {
        $title = "All Produk";
        $produk = Produk::orderBy('id', 'desc')->get();
        $kategori = Kategori::all();
        return view('landing.yield.cari', [
            'title' => $title,
            'produk' => $produk,
            'kategori' => $kategori,
            'jumlah' => $kategori
        ]);
    }

    public function searchAllProduk(Request $request)
    {
        $title = 'Search All Produk';
        $keyword = $request->search;
        $produk = Produk::where('nama_produk', 'like', "%" . $keyword . "%")->paginate();
        return view('landing.yield.search-produk', compact('produk', 'title', 'keyword',))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function tambahKeranjang(Request $request)
    {
        //Return di request
        $harga_detail = $request->harga * $request->jumlah;

        //cek User punya pesanan
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //save/ update pesanan
        if (empty($pesanan)) {
            Pesanan::create([
                'user_id'           => Auth::user()->id,
                'status'            => 0,
                'total_harga'       => $harga_detail,
                'kode_pemesanan'    => 'terserah',
                'kode_unik'         => mt_rand(100, 999)
            ]);
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $karakter_kode = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVXYZ";
            $pesanan->kode_pemesanan = substr(str_shuffle($karakter_kode), 0, 12);
            $pesanan->update();
        } else {
            $pesanan->total_harga = $pesanan->total_harga + $harga_detail;
            $pesanan->update();
        }

        if (empty($request->catatan)) {
            DetailPesanan::create([
                'produk_id'     => $request->id,
                'pesanan_id'    => $pesanan->id,
                'jumlah_pesanan' => $request->jumlah,
                'total_harga'   => $harga_detail,
                'catatan'   => "Kosong"

            ]);
            return redirect()->back()->with('Success', 'Berhasil menambahkan produk!');
        } else {
            DetailPesanan::create([
                'produk_id'     => $request->id,
                'pesanan_id'    => $pesanan->id,
                'jumlah_pesanan' => $request->jumlah,
                'total_harga'   => $harga_detail,
                'catatan'       => $request->catatan
            ]);
            return redirect()->back()->with('Success', 'Berhasil menambahkan produk!');
        }
    }

    public function listKeranjang()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $details = [];
        if ($pesanan) {
            $details = DetailPesanan::where('pesanan_id', $pesanan->id)->get();
        }

        return view('landing.yield.keranjang', [
            'details' => $details,
            'pesanan' => $pesanan
        ]);
    }

    public function delKeranjang($id)
    {
        $detail = DetailPesanan::findOrFail($id);
        $produk = Produk::where('id', $detail->produk_id)->first();

        if (!empty($detail)) {
            $pesanan = Pesanan::where('id', $detail->pesanan_id)->first();
            $jumlah_pesanan_detail = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
            if ($jumlah_pesanan_detail == 1) {
                $pesanan->delete();
            } else {
                $pesanan->total_harga = $pesanan->total_harga - $detail->total_harga;
                $pesanan->update();
            }
            $detail->delete();
        }
        return redirect()->back()->with('Success', "$produk->nama_produk berhasil dihapus");
    }
    public function checkout($username)
    {
        $user = User::where('username', $username)->first();
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        return view('landing.yield.checkout', [
            'user' => $user,
            'pesanan' => $pesanan
        ]);
    }
    public function updateAddress(Request $request)
    {
        $i = 1;
        if (Auth::user()) {
            $user = User::where('id', $request->id)->first();
            $user->address = $request->address;
            $user->update();

            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->status = 1;
            $pesanan->update();
        }

        return redirect()->route('landing.history');
    }

    public function history()
    {
        $i = 1;
        //Nyari detail pesnan dari id
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->orderBy('id', 'desc')->get();
            //Nyari detail pesnan user dari pesanan id
        }

        return view('landing.yield.history', [
            'i' => $i,
            'pesanan' => $pesanan,
        ]);
    }
}
