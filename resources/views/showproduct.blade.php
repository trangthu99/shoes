@extends('index')
@section('title','Home')
<link rel="stylesheet" href="\css\showproduct.css">
@section('content')


<section class="container-fluid">
	@if (count($products)==0)
	<section class="alert alert-info"><h5>Thật đáng tiếc!</h5> Chúng tôi không tìm thấy sản phẩm nào!</section>
	@else
	<section class="row" style="padding-top: 30px">
		@foreach($products as $product)
		<section class="product col-md-4 sp"  >
			<section id="images">
				<section class="img">
					<img width="230px" height="190px" src="{{asset('/images/'.$product->productImage)}}" style="margin-top: 30px; margin-bottom: 30px" class="img">
				</section>
				<section class="productName">
					{{$product->productName}}
				</section>
				<section class="price">
					{{number_format($product->productPrice,0,',','.')}} <sup style="color: red;"><b>VNĐ</b></sup>
				</section>
				<section class="order">
					<a href="{{url('cart/add/'.$product->id)}}" class="btn btn-outline-info" style="margin-bottom: 20px;"><i class="fa fa-cart-plus"></i>	Thêm vào giỏ</a>
					<a href="{{url('productdetail/'.$product->id)}}" class="btn btn-warning" style="margin-bottom: 20px;"><i class="fa fa-share"></i>	Chi tiết</a>
				</section>
			</section>
		</section>
		
		@endforeach

	</section>
	@endif	
</section>
<br>
<div style="margin-left: 80%">
	{{$products->links()}}
</div>
@endsection