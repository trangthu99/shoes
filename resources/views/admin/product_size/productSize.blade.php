@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
<!-- <link rel="stylesheet" href="/css/productdetail.css"> -->
@section('content')

<section style="width: 85%; background-color: white;margin-left: 7%">
<table class="table table-bordered table-striped mb-0">
	<tr>
		<th width="10%"  style="text-align: center;">ID</th>
		<th width="20%"  style="text-align: center;">Mã sản phẩm</th>
		<th width="10%"  style="text-align: center;">Thao tác</th>
	</tr>
	@foreach($productSizes as $productSize)

	<tr>
		<td  style="text-align: center;">00D{{$productSize->id}}</td>
		<td  style="padding-left: 100px">
			{{$productSize->productName}}
		</td>
	
		<td  style="text-align: center;">
			<a href="{{asset('admin/productSizeDetail/'.$productSize->id)}}" ><button class="btn btn-info">Chi tiết</button></a>
			
		</td>
	</tr>
	@endforeach
</table>
</section>
@stop