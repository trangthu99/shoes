@extends('index')
@section('title','Chi tiết sản phẩm')
<link rel="stylesheet" type="text/css" href="/css/productdetail.css">
<script src="/js/productdetail.js" type="text/javascript"></script>
@section('content')
<section class="container-fluid">
	<section class="row">
		<section class="col-md-6">
			<ul class="nav nav-tabs" style="border-bottom: none;">
				<li class="active"><a data-toggle="tab" href="#menu1"><img class="rounded-circle"width="60" height="45" src="{{asset('/images/'.$product->productImage)}}"></a></li>&nbsp;
				<li><a data-toggle="tab" href="#menu2"><img class="rounded-circle"width="60" height="45" src="{{asset('/images/'.$product->view1)}}"></a></li>&nbsp;
				<li><a data-toggle="tab" href="#menu3"><img class="rounded-circle"width="60" height="45" src="{{asset('/images/'.$product->view2)}}"></a></li>
			</ul>
			<br>
			<div class="tab-content img-magnifier-container" style="width: 423px;">
				<div id="menu1" class="tab-pane fade active show">
					<img id="img1" width="400" height="300" src="{{asset('/images/'.$product->productImage)}}">
				</div>
				<div id="menu2" class="tab-pane fade">
					<img id="img2" width="400" height="300" src="{{asset('/images/'.$product->view1)}}">
				</div>
				<div id="menu3" class="tab-pane fade">
					<img id="img3" width="400" height="300" src="{{asset('/images/'.$product->view2)}}">
				</div>
			</div>
		</div>


		@if($product->viewed == 0)
		<h5>(chưa có phản hồi đánh giá)</h5>
		@else
		<strong>Đánh giá chung:</strong>&nbsp;&nbsp;<b style="font-size: 20px;">{{round($product->rate, 1)}}</b><span class="fa fa-star checked" style="font-size: 30px;"></span>
		<h5>({{$product->viewed}} lượt đánh giá)</h5>
		@endif
	</section>
	<section class="col-md-6" style="margin-top: 10%">
		<h3 style="margin-left: 20%"><b>{{$product->productName}}</b></h3>
		@if($product->sale==0)
		<h3 style="color: red;">{{number_format($product->productPrice,0,',','.')}}<sup>đ</sup></h3>
		@else
		<section class="price" style="text-decoration: line-through;">
				<h2>{{number_format($product->productPrice,0,',','.')}}<sup>đ</sup></h2>
			</section>
			<section class="price" style="color: red;">
				<h2>{{number_format($product->priceNew,0,',','.')}}<sup>đ</sup></h2>
			</section>
		@endif
		<table class="table table-bordered" style="width: 60%;padding-right: 30%;margin-left: 20%;float: left;">
			<tr>
				<th style="background: #ccc;">Size</th>
				@foreach($sizes as $size)
				<td>{{$size->size}}</td>
				@endforeach
			</tr>
			<tr>
				<th style="background: #ccc;">SL</th>
				@foreach($productSizes as $productSize)
				<td>{{$productSize->quantity}}</td>
				@endforeach
			</tr>
			
		</table>
		<a href="{{url('cart/add/'.$product->id)}}" class="btn btn-outline-secondary" style=" margin-bottom: 20px;">Thêm vào giỏ</a>&nbsp;&nbsp;
		<a href="{{url('cart/add/'.$product->id)}}" class="btn btn-secondary" style=" margin-bottom: 20px;">Mua ngay</a>
	</section>
	<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
</section>
<section class="row" style="padding-top: 30px;">
	<section><h3><b>Mô tả:</b></h3></section>
	<section style="text-align: left; margin-left:10%;"><?= htmlspecialchars_decode($product->productDescription)?></section>
</section>


</section>
<section class="contaner-fluid" id="show" >
	<h3 style="color: orange; font-style: italic;"><b>Phản hồi từ khách hàng</b></h3>
	<div class="table-wrapper-scroll-y my-custom-scrollbar">
		<table id="comment" class="table table-bordered table-striped mb-0">

			@foreach($productComments as $productComment)

			<tr>
				<td scope="row"><h5>{{$productComment->user->fullname}}</h5></td>
				<td scope="row"><i class="fa fa-user-circle" style="font-size: 30px;"></i></td>
			</tr>
			<tr>
				<td scope="row">
					<small id="cmt"><i class="fa fa-commenting-o" ></i>&nbsp;{{$productComment->comment}}</small><br>
					<small><i class="fa fa-clock-o">&nbsp;{{$productComment->created_at}}</i></small>
				</td>
				<td scope="row">Voted:{{$productComment->rate}}&nbsp;<span class="fa fa-star checked"></span></td>
			</tr>
			@endforeach

		</table>
	</div>
</section>
<br>

<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("img1", 3);
magnify("img2", 3);
magnify("img3", 3);
</script>

@stop