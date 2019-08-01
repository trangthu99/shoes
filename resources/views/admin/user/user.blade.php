@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')


<section style="; background-color: white;">
	<a href="{{asset('admin/userinsert/')}}" class="btn btn-primary" style="margin:2;margin-left: 80%%" ><b>+ </b>Thêm mới</a>
	<hr>
	<table class="table table-bordered table-striped mb-0" style="width: 95%;margin: 2%" >
		<thead>
			<tr>
				<th>ID</th>
				<th>AdminName</th>
				<th>Password</th>
				<th>Status</th>
				<th>Tác vụ</th>
			</tr>
		</thead>
		<tbody>
			@foreach($admins as $admin)
			<tr>
				<th>{{$admin->id}}</th>
				<td>{{$admin->username}}</td>
				<td>{{$admin->password}}</td>
				<td>{{$admin->status}}</td>
				<td>
					<a href="{{asset('admin/useredit/'.$admin->id)}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
					<a href="{{asset('admin/delete/'.$admin->id)}}" class="btn btn-danger" onclick=" confirm('Bạn chắc chắn muốn xóa?')" ><i class="fa fa-close" aria-hidden="true"></i></a>

				</td>
			</tr>
			@endforeach
			<tr>

			</tr>
		</tbody>
	</table>	
</section>
@endsection