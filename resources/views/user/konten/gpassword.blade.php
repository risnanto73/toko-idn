@extends('user.template')

@section('content')
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">{{$title}}</h4>
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
					<a href="#">ssss</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Profile </div>
					</div>
					<div class="card-body">									

					<form action="{{route('update-pass')}}" method="POST">
						@csrf
						@method('PUT')

							<div class="row">
								<div class="col-md-1"></div>	

								<div class="col-md-6">
									@if(Session::get('Success'))
										<div class="alert alert-success alert-dismissible fade-show" role="alert">
											{{Session::get('Success')}}
										</div>
									@endif

									@if(Session::get('Failed'))
										<div class="alert alert-danger alert-dismissible fade-show" role="alert">
											{{Session::get('Failed')}}
										</div>
									@endif

									<div class="form">
								
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>Old Password :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">												
												<input type="password" name="old_password" class="form-control input-fixed @error('old_password') is-invalid @enderror" id="passNow">
												@error('old_password')
												<div class="invalid-feedback" role="alert">
													<strong>{{$message}}</strong>
												</div>
												@enderror
											</div>
										</div>

										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>New Password :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">												
											<input type="password" name="password" class="form-control input-fixed @error('password') is-invalid @enderror" id="passNow">
												@error('password')
												<div class="invalid-feedback" role="alert">
													<strong>{{$message}}</strong>
												</div>
												@enderror
											</div>
										</div>

										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>Retype Password :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">												
											<input type="password" name="password_confirmation" class="form-control input-fixed @error('password_confirmation') is-invalid @enderror" id="passNow">
												@if($errors->any('password_confirmation'))
												<div class="invalid-feedback" role="alert">
													<strong>{{}$errors->first('password_confirmation')}</strong>
												</div>
												@enderror
											</div>
										</div>
										
									</div> 	

								</div>										
							<div class="col-md-1"></div>
							
							</div>
						</div>
						<div class="card-footer">
							<div class="form">
								<div class="form-group from-show-notify row">
									<div class="col-lg-3 col-md-3 col-sm-12">

									</div>
									<div class="col-lg-4 col-md-9 col-sm-12">
										
											<button id="displayNotif" type="submit" class="btn btn-success">Ganti Password</button>
										
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