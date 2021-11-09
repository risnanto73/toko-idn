@extends('user.template')

@section('content')

<div class="card">
								<div class="card-header">
									<div class="card-title">Table </div>
								</div>
								<div class="card-body">
									<div class="card-sub">									
										TABLE
									</div>
									<table class="table mt-3">


									
										<thead>
										
											<tr>
												<th scope="col">NO</th>
												<th scope="col">IMAGES</th>
												<th scope="col">NAME</th>
												<th scope="col">USERNAME</th>
												<th scope="col">EMAIL</th>
												<th scope="col">ADDRESS</th>
												<th scope="col">SINCE</th>
											</tr>
										
										</thead>
										<tbody>
											@foreach($user as $user)
											<tr>
												<td>{{$i++}}</td>
												<td>
													<div style="width:100px;height:100px;">
														@if($user-> images != '')
															<img src="{{url('storage', $user-> images)}}" alt="" class="avatar-img rounded-circle">
														@else
															<img src="https://ui-avatars.com/api/?name={{Auth::user()-> username}}" alt="..." class="avatar-img rounded-circle">
														@endif
													</div>
												</td>
												<td>{{$user-> name}}</td>
												<td>{{$user-> username}}</td>
												<td>{{$user-> email}}</td>
												<td>{{$user-> address}}</td>
												<td>{{$user-> created_at}}</td>
											</tr>
											@endforeach
											
										</tbody>
									</table>
								</div>
							</div>
@endsection