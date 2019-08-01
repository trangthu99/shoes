@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')
<a style="margin-left: 80%" href="{{asset('admin/brands/insert')}}" class="btn btn-primary">
	<i class="fa fa-plus">&nbsp;Thêm hãng sản xuất</i>
</a><hr>
<table class="table table-bordered table-striped mb-0">
	<tr>
		<th>Tên nhãn hàng</th>
		<th>Action</th>
		<th>Thao tác</th>
	</tr>
	@foreach($brands as $brand)

	<tr>
		<td>{{$brand->brandName}}</td>
		<td>
			@if($brand->status == 1)
			<input type="checkbox" checked="checked">
			@else
			<input type="checkbox">
			@endif
		</td>
		<td>
			<a href="{{asset('admin/delete/brand/'.$brand->id)}}"class="btn btn-danger" onclick="return confirm('Bạn muốn xóa hãng này?')" ><i class="fa fa-close" aria-hidden="true"></i></a>&nbsp;&nbsp;
			<a href="{{asset('admin/edit/brand/'.$brand->id)}}" class="btn btn-info" ><i class="fa fa-pencil"></i></a>
		</td>
	</tr>
	@endforeach
</table>
@stop