@extends ('landing.template')

@section('isi')
<? $user = Illuminate\Support\Facades\Auth::user(); ?>

<div class="container">
    <!-- <div style="margin-top: -10px;">
        <div class="alert alert-success" role="alert">
            Produk Dihapus!
        </div>
    </div> -->
    <div class="row">
        <div class="col">
            <a href="#" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col md-6">
            <h3>Informasi Pembayaran</h3>
            <hr>
            <p>
                Untuk Pembayaran silahkan dapat transfer di rekening dibawah ini sebesar :
                <strong>Rp. {{number_format($pesanan->total_harga+$pesanan->kode_unik)}}</strong>
            </p>
            <table width="100%">
                <tr>
                    <td>
                        <div class="mt-4">
                            <img src="icon/mandirisyariah.png " alt="Bank BSI " width="100 ">
                        </div>
                    </td>
                    <td>
                        <div class="mt-4">
                            <h5>BANK BSI</h5>
                            No. Rekening 7173086353 a.n Bank Jago
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mt-4">
                            <img src="icon/mandirisyariah.png " alt="Bank BSI " width="100 ">
                        </div>
                    </td>
                    <td>
                        <div class="mt-4">
                            <h5>BANK Mandiri Syariah</h5>
                            No. Rekening 7173086353 a.n Bank Jago
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="icon/brisyariah.jpeg " alt="Bank BSI " width="100 ">
                    </td>
                    <td>
                        <div class="mt-4">
                            <h5>BANK BRI Syariah</h5>
                            No. Rekening 7173086353 a.n Bank Jago
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col md-6">
            <h3>Informasi Pengiriman</h3>
            <hr>
            <div class="form-group mb-3">
                <label for="">No. HP</label>
                <input type="text" readonly class="form-control input-fixed mt-2" name="number_phone" value="{{$user->number_phone}}">
            </div>

            <form action="{{route('landing.updateAddress')}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="form-group mb-3">
                    <label for="">Alamat</label>
                    <textarea type="text" class="form-control input-fixed mt-2" name="address" style="height: 190px;">{{$user->address}}</textarea>
                </div>
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Checkout
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Yakin Alamat benar?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>

</div>
@endsection