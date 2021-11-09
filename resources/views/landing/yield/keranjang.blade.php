@extends('landing.template')
@section('isi')
<div class="container">
    <div style="margin-top: 10px;" class="container">
    </div>
    @if (Session::get('Success'))
    <div style="margin-top: -10px;">
        <div class="alert alert-success" role="alert">
            {{Session::get('Success')}}
        </div>
    </div>
    @endif
    <div class="row container mt-5">
        <div class="col">
            <table class="table text-center">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Gambar</td>
                        <td>NAma Produk</td>
                        <td>Jumlah</td>
                        <td>Catatan</td>
                        <td>Harga</td>
                        <td>Total Harga</td>
                    </tr>
                <tbody>
                    @forelse ($details as $detail)
                    <tr>
                        <td>1</td>
                        <td><img src="{{url('storage/'.$detail->produk->gambar)}}" class="img-fluid" width="100" alt="..."></td>
                        <td>{{$detail->produk->nama_produk}}</td>
                        <td>{{$detail->jumlah_pesanan}}</td>
                        <td><strong></strong>{{$detail->catatan}}</td>
                        <td>{{$detail->produk->harga}}</td>
                        <td><strong>{{$detail->total_harga}}</strong> </td>
                        <td>
                            <form action="{{route('landing.delete',$detail->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn" type="submit">
                                    <i class="fas fa-trash text-danger" style="cursor: pointer;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8"> Data Kosong</td>
                    </tr>
                    @endforelse
                    <!-- <tr style="text-align: right;">
                                <td colspan="7"> Keranjang Masih Kosong</td>
                            </tr> -->
                    @if (!empty($pesanan))
                    <tr>
                        <td colspan="6" style="text-align:right;">Total Harga: </td>
                        <td style="text-align:right;">RP. {{$pesanan->total_harga}}</td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align:right;">Kode Unik: </td>
                        <td style="text-align:right;">Rp. {{number_format($pesanan->kode_unik)}}</td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align:right;">Total Bayar: </td>
                        <td style="text-align:right;">Rp. {{number_format($pesanan->total_harga+$pesanan->kode_unik)}}</td>
                    </tr>
                    <!-- <tr>
                                <td colspan="6" style="text-align:right;">Total Bayar: </td>
                                <td style="text-align:right;">Rp. 149.000</td>
                            </tr> -->
                    <tr>
                        <td colspan="6"></td>
                        <td style="text-align:right;">
                            <div class="d-grid gap-2 d-md-block">
                                <a class="btn btn-primary" href="{{route('landing.checkout', Auth::user()->username)}}" type="button"><i class="fas fa-arrow-right" __cpp="1"></i> Bayar Gaes</a>
                            </div>
                        </td>
                        @endif
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>


@endsection