@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')
<form method="post" enctype="multipart/form-data">
	@csrf
	<table class="table table-boredred" style="width: 80%;margin-left: 10%;padding-top: 5%">
		<tr>
			<th>Tên hãng:</th>
			<td>Status:</td>
		</tr>
		@foreach($brands as $brand)
		<tr>
			<td><input name="brandName" type="text" class="form-control" value="{{$brand->brandName}}"></td>			
			<td>
				@if($brand->status==0)
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
@stop 