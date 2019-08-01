@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
<style>
	#table{
		background:  #ebf2f9;
	}
	thead{
		color: blue;
		text-align: center;
	}
	td h3{
		color: red;
	}
</style>
@section('content')
<?php $total=0;?>
<h1>Chi tiết hóa đơn</h1>
<section class="row">
	<section class="col-md-5">
		<form method="post">
			@csrf
			<table id="table" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th colspan="2">Thông tin đơn hàng</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>Mã hóa đơn:</th>
						<td>00SH0{{$order->id}}</td>
					</tr>
					<tr>
						<th>Trạng thái đơn hàng:</th>
						<td>
							<select name="status">
								@if($order->status==1)
								<option selected="" value="1">Chưa xử lý</option>
								<option value="2">Đã đóng gói</option>
								<option value="3">Đang vận chuyển</option>
								<option value="4">Đã hoàn thành</option>
								@elseif($order->status==2)
								<option value="1">Chưa xử lý</option>
								<option selected="" value="2">Đã đóng gói</option>
								<option value="3">Đang vận chuyển</option>
								<option value="4">Đã hoàn thành</option>
								@elseif($order->status==3)
								<option value="1">Chưa xử lý</option>
								<option value="2">Đã đóng gói</option>
								<option selected="" value="3">Đang vận chuyển</option>
								<option value="4">Đã hoàn thành</option>
								@else
								<option value="1">Chưa xử lý</option>
								<option value="2">Đã đóng gói</option>
								<option value="3">Đang vận chuyển</option>
								<option selected="" value="4">Đã hoàn thành</option>
								@endif
							</select>
						</td>
					</tr>
					<tr>
						<th>Ngày lập:</th>
						<td>{{$order->orderDate}}</td>
					</tr>
				</tbody>
			</table>
			<section class="form-group" style="margin-left: 30%;">
				<input type="submit" value="Xác nhận" class="btn btn-success">
				&nbsp;&nbsp;
				<input type="reset"  value="Đặt lại" class="btn btn-outline-warning">
			</section>
		</section>
	</form>

	<section class="col-md-7">
		<table id="table" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th colspan="2">Thông tin khách hàng</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Họ và tên:</th>
					<td>{{$order->user->fullname}}</td>
				</tr>
				<tr>
					<th>Điện thoại:</th>
					<td>{{$order->user->mobile}}</td>
				</tr>
				<tr>
					<th>Email:</th>
					<td>{{$order->user->email}}</td>
				</tr>
				<tr>
					<th>Địa chỉ đặt hàng:</th>
					<td>{{$order->user->address}}</td>
				</tr>
			</tbody>
		</table>
	</section>
</section>

<table id="table" class="table table-bordered table-striped mb-0">
	<thead>
		<tr>
			<th colspan="5">Danh sách sản phẩm</th>
		</tr>
	</thead>
	<tr>
		<th>Sản phẩm</th>		
		<th>Size</th>
		<th>Số lượng</th>
		<th>Đơn giá</th>
		<th>Thành tiền</th>
	</tr>
	@foreach($orderDetails as $orderDetail)
	<tr>
		<td width="450"><a href="{{asset('productdetail/'.$orderDetail->product->id)}}"><img style="width: 15% " src="{{asset('/images/'.$orderDetail->product->productImage)}}">{{$orderDetail->product->productName}}</a></td>
		<td>{{$orderDetail->size}}</td>
		<td>{{$orderDetail->quantity}}</td>
		<td>{{number_format($orderDetail->price,0,',','.')}}</td>
		<td>{{number_format($orderDetail->quantity*$orderDetail->price,0,',','.')}}</td>
	</tr>
	<?php $total += $orderDetail->quantity*$orderDetail->price; ?>
	@endforeach
	<tr>
		<td colspan="2"></td>
		<td colspan="3"><h3>Tổng tiền:&nbsp;&nbsp;{{number_format($total,0,',','.')}}</h3></td>
	</tr>
</table>

@stop