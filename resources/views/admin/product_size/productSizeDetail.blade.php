@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
<!-- <link rel="stylesheet" href="/css/productdetail.css"> -->
@section('content')


<section style="width: 85%; background-color: white;margin-left: 7%">
	
	<table class="table table-bordered table-striped mb-0">
		<thead>
			<tr><h4 style="text-align: center;">Tên sản phẩm: {{$product->productName}}</h4><br></tr>
			<tr>
				<th width="20%"  style="text-align: center;"  >ID</th>
				<th width="20%"  style="text-align: center;">Mã Sản phẩm</th>
				<th width="20%"  style="text-align: center;">Mã size</th>
				<th width="20%"  style="text-align: center;">Số lượng</th>
				<th width="10%" style="text-align: center;">Thao tác</th>
			</tr>
		</thead>
		<tbody>
			@foreach($productSizes as $productSize)
			
			<tr>
				<td >{{$productSize->id}}</td>
				<td>{{$productSize->productId}}</td>
				<td>{{$productSize->sizeId}}</td>
				<td>{{$productSize->quantity}}</td>
				<td >
					<a href="{{asset('admin/productSizeEdit/'.$productSize->id)}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
				</td>
			</tr>
			@endforeach
			<tr>

			</tr>
		</tbody>
	</table>	
</section>
@endsection