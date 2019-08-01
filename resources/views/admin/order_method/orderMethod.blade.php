@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')
<a href="{{asset('admin/ordermethods/insert')}}" class="btn btn-primary">
	<i class="fa fa-plus">&nbsp;Thêm hãng sản xuất</i>
</a><hr>
<table class="table table-bordered table-striped mb-0">
	<tr>
		<th>ID</th>
		<th>Phương thức</th>
		<th>Action</th>
		<th>Thao tác</th>
	</tr>
	@foreach($ordermethods as $ordermethod)

	<tr>
		<th>{{$ordermethod->id}}</th>
		<td>{{$ordermethod->methodName}}</td>
		<td>
			@if($ordermethod->status == 1)
			<input type="checkbox" checked="checked">
			@else
			<input type="checkbox">
			@endif
		</td>
		<td>
			<a class="btn btn-danger" href="{{asset('admin/delete/ordermethod/'.$ordermethod->id)}}" onclick="return confirm('Bạn muốn xóa hãng này?')" ><i class="fa fa-close" aria-hidden="true"></i></a>&nbsp;&nbsp;
			<a class="btn btn-info" href="{{asset('admin/edit/ordermethod/'.$ordermethod->id)}}"><i class="fa fa-pencil"></i></a>
		</td>
	</tr>
	@endforeach
</table>
@stop