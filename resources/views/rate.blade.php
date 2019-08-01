@extends('index')
@section('title','Giỏ hàng')
<link rel="stylesheet" type="text/css" href="/css/orderdetail.css">
@section('content')
<form method="post" style="width:80%;" class="modal-content animate">
	@csrf
	<b>Sản phẩm đã mua:</b>
	<a href="{{asset('productdetail/'.$product->id)}}"><img class="rounded-circle" style="width: 15% " src="{{asset('/images/'.$product->productImage)}}">&nbsp;<h3>{{$product->productName}}</h3></a><hr>
	<h4>Phản hồi dưới tên <a href="/user" style="text-decoration:none;"><b>{{$userName->fullname}}</b></a></h4>
	<table class="table table-bordered">
		<tr>
			<th>Comment:</th>
			<td colspan="3"><input type="text" placeholder="Nhập bình luận..." name="comment" required></td>
		</tr>
		<tr>
			<th>Rate:</th>
			<td><input style="width: 100px;" class="ip" type="number" min="1" max="10" name="rate" placeholder="Rate*" required>&nbsp;	
				<b>| 10 </b><span style="color: gold; font-size: 20px;" class="fa fa-star checked"></span>&nbsp;
				<button class="btn btn-dark" type="submit">Post</button>
				<button type="reset" class="btn btn-danger">Reset</button>
			</tr>
		</table>
	</form>
	@stop