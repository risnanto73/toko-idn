<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Kategori;
use App\Models\Pesanan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $kategori = Kategori::orderBy('id', 'desc')->get();
        View::share([
            'kategori' => $kategori,
        ]);        
    }


}
