@extends('index')
@section('title','Giỏ hàng')
<link rel="stylesheet" type="text/css" href="/css/cart.css">
@section('content')
@if(session('cart'))
<?php 
$products=DB::table('products')->whereIn('id',array_keys(session('cart')))->get();
$total=0;
?>

<form method="post" action="{{url('cart/update')}}" id="formCart">
	
	@csrf
	<section id="title" class="cart row">
		<section class="col-md-3">
			<b>Sản phẩm</b>
		</section>
		<section class="col-md-2">
			<b>Đơn giá</b>
		</section>
		<section class="col-md-2">
			<b>Size</b>
		</section>
		<section class="col-md-2">
			<b>Số lượng</b>
		</section>
		<section class="col-md-2">
			<b>Thành tiền</b>
		</section>
		<section class="col-md-1">
		</section>
	</section>
	@foreach($products as $product)
	<section class="cart item row">
		<section class="col-md-3">
			<img src="{{asset('/images/'.$product->productImage)}}" width="75%;">&nbsp;
			{{$product->productName}}
		</section>
		<section class="col-md-2">
			@if($product->sale==0)
			{{number_format($product->productPrice,0,',','.')}}
			@else
			{{number_format($product->priceNew,0,',','.')}}
			@endif
		</section>
		<section class="col-md-2">
			<input autocomplete="on" min="36" max="43" class="form-control form-control-sm" type="number" name="{{$product->id}}size" value='{{session("cart.$product->id.size")}}'>	
		</section>
		<section class="col-md-2">
			<input autocomplete="on" min="1" class="form-control form-control-sm" type="number" name="{{$product->id}}number" value='{{session("cart.$product->id.number")}}'>	
		</section>
		<section class="col-md-2">
			@if($product->sale==0)
			{{number_format($product->productPrice*session("cart.$product->id.number"),0,',','.')}}
			@else
			{{number_format($product->priceNew*session("cart.$product->id.number"),0,',','.')}}
			@endif
		</section>
		<section class="col-md-1">
			<a href="{{url('cart/delete/'.$product->id)}}"><i class="fa fa-trash-o" style="font-size:24px; color:red;"></i></a>
		</section>
	</section>
	{{-- {{$product->id.'=>'.session("cart.$product->id.number")}} --}}
	<?php if ($product->sale==0) {
		$total = $total + $product->productPrice*session("cart.$product->id.number");
	}else{
		$total = $total + $product->priceNew*session("cart.$product->id.number");
	}
	?><hr>
	@endforeach

	<section class="row">
		<section class="col-md-4 mr-auto">
			<a onclick="return confirm('Bạn chắc chứ?')" href="{{url('cart/deleteall')}}" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Xóa tất cả</a>
			&nbsp;<input class="btn btn-success" type="submit" value="Cập nhật" form="formCart">
		</section>
		<section class="col-md-3.5">
		</section>
		<section class="col-md-1.5">
			<h5><b>Tổng tiền:</b></h5>
		</section>
		<section class="col-md-2">
			<b>{{number_format($total,0,',','.')}}</b>
		</section>
		<section class="col-md-2">
			<a class="btn btn-warning" href="{{url('cart/order')}}"><i class="fa fa-shopping-cart"></i>&nbsp;Đặt hàng</a>
		</section>

	</section>
</form>
@else
<section class="alert alert-danger" style="text-align: center;">Giỏ hàng trống</section>
@endif

@endsection