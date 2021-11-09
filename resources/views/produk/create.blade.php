@extends('user.template')

@section('content')
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Create Produk</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="{{route('profile.index')}}">
						<i class="flaticon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="{{route('produk.store')}}">Create Produk</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Produk</div>
					</div>
					<form action="{{url('/produk')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="card-body">
							<div class="row">
								<div class="col-md-1"></div>
								<div class="col-md-6">
									<div class="form">
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>NAMA PRODUK :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<input type="text" name="nama_produk" class="form-control input-fixed" id="exampleInputPassword1">
											</div>
										</div>
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>HARGA :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<input type="text" name="harga" class="form-control input-fixed" id="exampleInputPassword1">
											</div>
										</div>
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>KATEGORI :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<!-- <input type="text" name="sedia" class="form-control input-fixed" id="exampleInputPassword1"> -->
												<select class="@error('kategori_id') is-valid @enderror form-control input-fixed" name="kategori_id">
													<option value="">PILIH KATEGORI</option>
													@foreach($kategori as $isi)
													<option value="{{$isi->id}}">{{$isi->nama_kategori}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>SEDIA :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
											<select class="@error('kategori_id') is-valid @enderror form-control input-fixed" name="sedia">
													<option value="">PILIH SEDIA</option>
													<option value="Tersedia">Tesedia</option>                                                                                                                                                                       >Tesedia</option>
													<option value="Kosong">Kosong</option>																							
												</select>
												@error('kategori_id')
												<div class="invalid-feedback" style="width: 300px !important;" role="alert">
													<strong>{{$message}}</strong>
												</div>
												@enderror
											</div>
										</div>
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>BERAT :
													<span></span>
												</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<input type="text" name="berat" class="form-control input-fixed" id="exampleInputPassword1">
											</div>
										</div>
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>Photo :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<img src="https://ui-avatars.com/api/?name={{Auth::user()-> username}}" alt="..." class="avatar-img rounded">
											</div>
										</div>
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label> Gambar :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<input type="file" name="gambar">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-1"></div>
							</div>
							<div class="form">
								<div class="form-group from-show-notify row">
									<div class="col-lg-3 col-md-3 col-sm-12">
									</div>
									<div class="col-lg-4 col-md-9 col-sm-12">
										<button id="displayNotif" type="submit" class="btn btn-success">Add Produk</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection