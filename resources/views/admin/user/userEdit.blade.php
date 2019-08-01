@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')

<div class="body">
	<form method="post" >
		@csrf
		
		<div >
			<h2><br><b>Chỉnh sửa thông tin Admin</b></h2>
		</div>

		<table class="table table-bordered table-striped mb-0">
			<tr>
				<th>Admin Name</th>
				<th>New Password</th>
				<th>Status</th>
			</tr>
			@foreach($admins as $admin)
			<tr>
				<td><input type="text" name="username" class="form-control" required=""  value="{{$admin->username}}"></td>			
				<td><input type="password" name="newpassword" class="form-control" required="" value="{{$admin->password}}"></td>
				<td>
					@if($admin->status==0)
					<input type="radio" name="status" value="1">Active
					<input type="radio" name="status" value="0" checked="">Not Active
					@else
					<input type="radio" name="status" value="1" checked="">Active
					<input type="radio" name="status" value="0">Not Active
					@endif
				</td>
			</tr>
			@endforeach
		</table>
		<section class="form-group" style="margin-left: 30%;">
			<input type="submit" value="Xác nhận" class="btn btn-success">
			&nbsp;&nbsp;
			<input type="reset"  value="Đặt lại" class="btn btn-outline-warning">
		</section>

	</form>
</div>
@endsection
