@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')
<table class="table table-bordered table-striped mb-0">
	<tr>
		<th>Họ tên khách hàng</th>
		<th>Phương thức thanh toán</th>
		<th>Trạng thái đơn hàng</th>
		<th>Thao tác</th>
	</tr>
	@foreach($orders as $order)

	<tr>
		<td>{{$order->user->fullname}}</td>
		<td>{{$order->method->methodName}}</td>
		<td>
			@if($order->status==1)
			Chưa xử lý
			@elseif($order->status==2)
			Đã đóng gói
			@elseif($order->status==3)
			Đang vận chuyển
			@elseif($order->status==4)
			Đã giao hàng thành công
			@endif
		</td>
		<td>
			<a href="{{asset('admin/edit/order/'.$order->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
			@if($order->status==4)
			<a href="{{asset('admin/delete/order/'.$order->id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-close"></i></a>
			@else		
			@endif
			
		</td>
	</tr>
	@endforeach
</table>
@stop