<!-- MODAL UPDATE -->
<div class="modal fade" id="updateLunas{{$pesan->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Status</span>
                    <span class="fw-light">
                        Update
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('lunas.update')}}" role="form">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{$pesan->id}}" name="id">
                <div class="modal-body">
                    <p class="small">Update a new row using this form, make sure you fill them all</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Status</label>
                                <select name="status" class="form-select" aria-label="Default select example">
                                    <option value="1">Pending</option>
                                    <option value="2">Lunas</option>
                                    <option value="3">Dikirim</option>
                                </select>
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