<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function pending(){
        $i=1;
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->orderBy('id', 'desc')->paginate(5);
        }

        return view('user.konten.pending',[
            'i' => $i,
            'pesanan' => $pesanan
        ]);
    }
    
    public function edtPending(Request $request){
        // return dd($request);
        $pesanan = Pesanan::where('id', $request->id)->first();
        $pesanan->status = $request->status;
        $pesanan->update();
        return redirect()->back();

    }

    public function lunas(){
        $i=1;
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 2)->orderBy('id', 'desc')->paginate(5);
        }
        return view('user.konten.lunas',[
            'i' => $i,
            'pesanan' => $pesanan
        ]);
    }

    public function edtLunas(Request $request){
        // return dd($request);
        $pesanan = Pesanan::where('id', $request->id)->first();
        $pesanan->status = $request->status;
        $pesanan->update();
        return redirect()->back();

    }

    public function dikirim(){
        $i=1;
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 3)->orderBy('id', 'desc')->paginate(5);
        }
        return view('user.konten.dikirim',[
            'i' => $i,
            'pesanan' => $pesanan
        ]);
    }
}
