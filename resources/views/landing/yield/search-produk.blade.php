@extends('landing.template')
@section('isi')
<section class="container mt-5 mb-5">

    <form class="form" method="get" action="{{ route('searchAllProduk') }}">
        <div class="form-group w-50 mb-3">
            <input value="{{$keyword}}" type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Mau cari apa?">
            <button type="submit" class="btn btn-primary mb-1">Cari</button>
        </div>
    </form>

    <div class="row">
        @forelse ($produk as $isi)
        <div class="col-md-3" style="padding-top: 25px !important;">
            <div class="card text-center" style="width: 16rem !important;">
                <img src="{{url('storage/'.$isi->gambar)}}" class="card-img-top img-thumbnail" alt="...">
                <div class="card-body">
                    <h5><strong class="card-title">{{$isi->nama_produk}}</strong></h5>
                    <h5 class="card-title">Rp.{{number_format($isi->harga)}}</h5>
                    <!-- <p class="card-text">Men's Philadelphia 76ers Allen Iverson Mitchell & Ness Black 2000-01 Hardwood Classics Swingman Jersey</p> -->
                    <div class="row">
                        <!-- {{url('produk/'.$isi->slug)}} -->
                        <a href="{{route('produk.detail',$isi->slug)}}" class="btn btn-primary mt-3">Detail</a>
                        <a href="#" class="btn btn-primary mt-1">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <tr>
            <td colspan="3" class="text-center">Data Tidak Ditemukan</td>
        </tr>
        @endforelse
    </div>
</section>
@endsection