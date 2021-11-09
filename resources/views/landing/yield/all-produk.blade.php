@extends('landing.template')
@section('isi')
<section class="container mt-5 mb-5">
    <h3 class="d-flex justify-content-between">
        <strong>{{$title}}</strong>
        <a href="#" class="btn btn-primary">View All</a>
    </h3>

    <div class="row">
        @foreach ($produk as $isi)
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
        @endforeach
    </div>
</section>
@endsection