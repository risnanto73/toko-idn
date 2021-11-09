@extends ('user.template')

@section('content')
<div class="col-md-12" style="margin-top: 80px;">
	<div class="card">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h4 class="card-title">Add Row</h4>
				<a class="btn btn-primary btn-round ml-auto" type="button" href="{{route('produk.create')}}">
					<i class="fa fa-plus"></i>
					Add Row
				</a>
			</div>
		</div>
		<div class="card-body">
			<!-- Modal -->
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
							<th>NAMA PRODUK</th>
							<th>NAMA KATEGORI</th>
							<th>HARGA</th>
							<th>SEDIA</th>
							<th>BERAT</th>
							<th>GAMBAR</th>
							<th style="width: 10%">Action</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($produk as $isi)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$isi->nama_produk}}</td>
							<td>{{$isi->kategori->nama_kategori}}</td>
							<td>Rp.{{number_format($isi->harga)}}</td>
							<td>{{$isi->sedia}}</td>
							<td>{{$isi->berat}} Kg</td>
							<td><img src="{{url('storage/'.$isi->gambar)}}" style="max-width: 100px;" class="img-thumbnail" alt=""></td>
							<td>
								<div class="form-button-action">
									<a href="{{route('produk.edit', $isi->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
										<i class="fa fa-edit"></i>
									</a>
									<form action="{{route('produk.destroy', $isi->id)}}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
											<i class="fa fa-times"></i>
										</button>
									</form>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="row">
					<div class="col-sm-12 col-md-5">
						<div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">
							Showing &nbsp; <strong>{{ $produk->firstItem() }}</strong> &nbsp;
							to &nbsp; <strong>{{ $produk->lastItem() }}</strong> &nbsp;
							of &nbsp; <strong>{{ $produk->total() }}</strong> &nbsp; entries
						</div>
					</div>
					<div class="col-sm-12 col-md-7">
						<div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
							{{ $produk->links('pagination::bootstrap-4') }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
						New</span>
					<span class="fw-light">
						Row
					</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="small">Create a new row using this form, make sure you fill them all</p>
				<form>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label>Name</label>
								<input id="addName" type="text" class="form-control" placeholder="fill name">
							</div>
						</div>
						<div class="col-md-6 pr-0">
							<div class="form-group form-group-default">
								<label>Position</label>
								<input id="addPosition" type="text" class="form-control" placeholder="fill position">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Office</label>
								<input id="addOffice" type="text" class="form-control" placeholder="fill office">
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer no-bd">
				<button type="button" id="addRowButton" class="btn btn-primary">Add</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

@endsection