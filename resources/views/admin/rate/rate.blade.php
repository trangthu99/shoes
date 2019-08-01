@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')
<table class="table table-bordered table-striped">
	<tr>
		<th>ID</th>
		<th>Sản phẩm</th>
		<th></th>
	</tr>
	@foreach($products as $product)
	<tr>
		<th>{{$product->id}}</th>
		<td><a href="{{url('admin/rateDetail/'.$product->id)}}">
			&nbsp;
			<img style="width: 10% " src="{{asset('/images/'.$product->productImage)}}" alt="">{{$product->productName}}
		</a></td>
		<td><a href="{{url('admin/rateDetail/'.$product->id)}}" class="btn btn-outline-success"><i class="fa fa-commenting"></i></a></td>	
	</tr>
	@endforeach
</table>

@stop