@extends('index')
@section('title','Home')
<link rel="stylesheet" href="\css\showproduct.css">
@section('content')

<section class="container-fluid">
	@if (count($sales)==0)
	<section class="alert alert-info"><h5>Thật đáng tiếc!</h5> Chúng tôi không tìm thấy sản phẩm nào!</section>
	@else
	<section class="row" style="padding-top: 30px">
		@foreach($sales as $sale)
		<section class="product col-md-4 sp" >
			<section id="images">
				<section class="img">
					<img width="210px" height="175px" src="{{asset('/images/'.$sale->productImage)}}" style="margin-top: 30px; margin-bottom: 30px">
				</section>
				<section class="productName">
					{{$sale->productName}}
				</section>
				<section class="price" style="text-decoration: line-through;">
					{{number_format($sale->productPrice,0,',','.')}} <sup style="color: red;"><b>VNĐ</b></sup>
				</section>
				<section class="price" style="color: red; padding-bottom: px">
					{{number_format($sale->priceNew,0,',','.')}} <sup style="color: red;"><b>VNĐ</b></sup>
				</section>
				<section class="order">
					<a href="{{url('cart/add/'.$sale->id)}}" class="btn btn-outline-info" style="margin-bottom: 20px;">Thêm vào giỏ</a>
					<a href="{{url('productdetail/'.$sale->id)}}" class="btn btn-warning" style="margin-bottom: 20px;">Chi tiết</a>
				</section>
			</section>
		</section>
		@endforeach
	</section>

	@endif	
</section>
<section>
	{{$sales->links()}}
</section>
@endsection