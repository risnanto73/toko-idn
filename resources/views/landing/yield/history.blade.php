@extends('landing.template')
@section('isi')

<table class="table container mt-5">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal Pesan</th>
            <th scope="col">Kode Pesanan</th>
            <th scope="col">Gambar</th>
            <th scope="col">Status</th>
            <th scope="col">Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $pesanan as $pesan)
        <tr>
            <td scope="col">{{$i++}}</td>
            <td scope="col">{{$pesan->created_at}}</td>
            <td scope="col">{{$pesan->kode_pemesanan}}</td>
            <td scope="col">
                <?php $detail = App\Models\DetailPesanan::where('pesanan_id', $pesan->id)->get(); ?>
                @foreach ($detail as $det )
                <img src="{{url('storage/',$det->produk->gambar)}}" width="100px" class="img-fluid" alt="">
                {{$det->produk->nama_produk}}
                @endforeach

            </td>
            <td scope="col"> 
                @if ($pesan->status == 1)
                <span class="badge bg-warning" style="font-size: 12px;"><i class="fas fa-check"> Pending</i></span>
                @elseif ($pesan->status == 2)
                <span class="badge bg-success" style="font-size: 12px;"><i class="fas fa-check"> Lunas</i></span>
                @elseif ($pesan-> status ==3)
                <span class="badge bg-primary" style="font-size: 12px;"><i class="fas fa-check"> Dikirim</i></span>
                @endif
            </td>
            <td scope="col"><strong>Rp. {{number_format($pesan->total_harga+$pesan->kode_unik)}}</strong></td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="container">

<div class="row mt-4">

<div class="col">
    <div class="card shadow py-3 px-3">
        <div class="card-body">
            <p>Untuk konfirmasi pembayaran silahkan hubungi admin melalui : </p>
            <div class="media">
                <img class="mr-3" src="icon/wa.png" alt="Logo WhatsApp" width="60">
                <div class="media-body mt-2">
                    <h5 class="mt-0">WhatsApp</h5>
                    +62 8382-3098-680 <br>
                    <div class="mt-2">
                        <a target="_blank" href="https://api.whatsapp.com/send?phone=6283823098680" class="btn btn-success btn-sm">Hubungi Admin di WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col">
    <div class="card shadow py-3 px-3">
        <div class="card-body">
            <p>Untuk konfirmasi pembayaran silahkan hubungi admin melalui : </p>
            <div class="media">
                <img class="mr-3" src="icon/tel.png" alt="Bank BRI" width="40">
                <div class="media-body mt-2">
                    <h5 class="mt-0">Telegram</h5>
                    +62 8382-3098-680 <br>
                    <div class="mt-2">
                        <a target="_blank" href="https://t.me/tiolast63" class="btn btn-success btn-sm">Hubungi Admin di Telegram</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<div class="row mt-5">
<div class="col">
    <div class="shadow alert alert-success" role="alert">
        <h6><strong>*Saat konfirmasi silahkan lampirkan :</strong></h6>
        <p><strong>1. Struk bukti transfer diikuti dengan kode unik pada total harga</strong></p>
    </div>
</div>
</div>
</div>

@endsection