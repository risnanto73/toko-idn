@extends ('landing.template')

@section('isi')
<div class="container" style="margin-top: 10px;">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Details</li>
            </ol>
        </nav>
    </div>
    
    @if (Session::get('Success'))
    <div style="margin-top: -10px;">
        <div class="alert alert-success" role="alert">
            {(Session::get('Success'))}
        </div>
    </div>
    @endif

    <form action="{{route('landing.keranjang')}}" method="post">
        @csrf

        <input type="hidden" value="{{$produk->id}}" name="id">
        <input type="hidden" value="{{$produk->nama_produk}}" name="nama_produk">
        <input type="hidden" value="{{$produk->harga}}" name="harga">

        <div class="row mt-4">
            <div class="col md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{url('storage/'.$produk->gambar)}}" class="img-fluid w75" style="max-width: 100%; height: auto;" alt="...">
                    </div>
                </div>
            </div>
            <div class="col md-6">
                <h4>{{$produk->nama_produk}}</h4>
                <h3 name="harga" >RP. {{number_format($produk->harga)}}
                    @if ($produk->sedia == 'Tersedia')
                    <span class="badge bg-success" style="font-size: 12px;"><i class="fas fa-check"> Tersedia</i></span>
                    @else
                    <span class="badge bg-danger" style="font-size: 12px;"><i class="fas fa-times"></i> Kosong</span>
                    @endif
                </h3>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Kategori</th>
                            <td colspan="2">{{$produk->kategori->nama_kategori}}</td>
                            <td></td>
                        </tr>
                        <tr></tr>
                        <th>Berat</th>
                        <td colspan="2">{{$produk->berat}} Kg</td>
                        <td></td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td colspan="2">
                                <input required type="number" name="jumlah">
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Catatan</th>
                            <td colspan="2">
                                <textarea name="catatan" id="" fillable="OK" cols="30" placeholder="Opsional" rows="4"></textarea>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                @guest
                <p><a href="{{route('login')}}">Login</a> <span>dulu yah kak, sebelum masukin keranjang!</span></p>
                @else
                @if ($produk->sedia == 'Tersedia')
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart">&nbsp; &nbsp; Keranjang</i></button>
                </div>
                @else
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-danger" type="button">Tidak Tersedia</a>
                </div>
                @endif
                @endguest
            </div>
        </div>
    </form>

</div>
@endsection