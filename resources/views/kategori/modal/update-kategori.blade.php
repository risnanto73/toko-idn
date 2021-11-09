<!-- MODAL UPDATE -->
<div class="modal fade" id="updateKategori{{$isi->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Kategori</span>
                    <span class="fw-light">
                        Update
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('kategori.update', $isi->id)}}" role="form">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <p class="small">Update a new row using this form, make sure you fill them all</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Kategori</label>
                                <input id="kategori" name="nama_kategori" value="{{$isi->nama_kategori}}" type="text" class="form-control" placeholder="fill name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>