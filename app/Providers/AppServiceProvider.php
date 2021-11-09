<?php

namespace App\Providers;

use App\Models\DetailPesanan;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $jumlah = 0;
            if (Auth::user()) {
                $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
                if ($pesanan) {
                    $jumlah = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
                }
            } 
            $view->with('jumlah', $jumlah);
        });
    }
}
