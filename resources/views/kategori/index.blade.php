@extends ('user.template')

@section('content')
<div class="col-md-12" style="margin-top: 80px;">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Data Kategori</h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Add Kategori
                </button>
            </div>
        </div>
        <div class="card-body">
            <form class="form" method="get" action="{{ route('search') }}">
                <div class="form-group w-100 mb-3">
                    <label for="search" class="d-block mr-2">Pencarian</label>
                    <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                </div>
            </form>
            <!-- Start kode untuk form pencarian -->
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategori as $isi)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$isi->nama_kategori}}</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" title="Edit" class="btn btn-link btn-primary btn-lg btn-round" data-original-title="Edit Task" data-toggle="modal" data-target="#updateKategori{{$isi->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                        <!-- <form action="{{route('kategori.delete', $isi->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" data-toggle="tooltip" title="Delete" onclick="return confirm('Hapus Data {{$isi->nama_kategori}} ?')" class="btn btn-link btn-danger" data-original-title="Remove">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form> -->
                                    <button data-target="#delKategori{{$isi->id}}" data-toggle="modal" title="Delete" class="btn btn-link btn-danger" data-original-title="Remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    @include('kategori.modal.delete-kategori')
                                    @include('kategori.modal.update-kategori')
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">Data Tidak Ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">
                            Showing &nbsp; <strong>{{ $kategori->firstItem() }}</strong> &nbsp;
                            to &nbsp; <strong>{{ $kategori->lastItem() }}</strong> &nbsp;
                            of &nbsp; <strong>{{ $kategori->total() }}</strong> &nbsp; entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
                            {{ $kategori->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal ADD -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Kategori</span>
                    <span class="fw-light">
                        Baru
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('kategori.add')}}" role="form">
                @csrf
                <div class="modal-body">
                    <p class="small">Create a new row using this form, make sure you fill them all</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Kategori</label>
                                <input id="kategori" name="nama_kategori" type="text" class="form-control" placeholder="fill name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection