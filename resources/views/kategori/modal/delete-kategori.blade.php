<!-- Modal DELETE -->
<form action="{{route('kategori.delete', $isi->id)}}" method="post">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="delKategori{{$isi->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            Konfrimasi</span>
                        <span class="fw-light">
                            Hapus Kategori
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="small">Create a new row using this form, make sure you fill them all</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <p>Hapus Data {{$isi->nama_kategori}} ?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Hapus</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</form>