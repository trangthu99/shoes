@extends('index')
@section('title','Giỏ hàng')
<link rel="stylesheet" type="text/css" href="">
@section('content')
@if(session('alert'))
<script>
	alert("Hàng đã đặt thành công! Chúng tôi sẽ giao hàng sớm nhất cho bạn");
	location = '/order/follow';
</script>
@endif
@if($count==0)
<section class="alert alert-success">Bạn chưa đặt hàng thì lấy đâu ra đơn hàng</section>
@else
<table class="table table-bordered table-striped mb-0">
	<tr>
		<th>Mã đơn hàng</th>		
		<th>Thời gian đặt hàng</th>
		<th>Phương thức thanh toán</th>
		<th>Trạng thái đơn hàng</th>
		<th>Thao tác</th>
	</tr>
	@foreach($orders as $order)

	<tr>
		<th>{{$order->id}}</th>
		<td>{{$order->orderDate}}</td>
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
			<a class="btn btn-sm btn-outline-info" href="{{asset('order/detail/'.$order->id)}}">Xem</a>
			@if($order->status==1)
			<a href="{{asset('admin/delete/order/'.$order->id)}}" onclick="return confirm('Hiện tại đơn hàng này chưa được xử lý, Bạn chắc chắn muốn hủy?')" class="btn btn-sm btn-danger">Hủy</a>
			@else		
			@endif
		</td>
	</tr>
	@endforeach
</table>
@endif
@stop