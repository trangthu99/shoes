@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')

<section style="; background-color: white;">
	<a href="{{asset('admin/priceInsert/')}}" class="btn btn-primary" style="margin:2%; margin-left: 80%"><b>+ </b>Thêm mới</a>
	<hr>
	<table class="table table-bordered table-striped mb-0" style="width: 95%;margin: 2%" >
		<thead>
			<tr>
				<th>ID</th>
				<th>Price name</th>
				<th>Price from</th>
				<th>Price to</th>
				<th>Tác vụ</th>
			
			</tr>
		</thead>
		<tbody>
			@foreach($prices as $price)
			<tr>
				<th>{{$price->id}}</th>
				<td>{{$price->priceName}}</td>
				<td>{{$price->priceFrom}}</td>
				<td>{{$price->priceTo}}</td>
				<td>
					<a href="{{asset('admin/priceEdit/'.$price->id)}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
					<a href="{{asset('admin/price/delete/'.$price->id)}}" class="btn btn-danger" onclick=" confirm('Bạn chắc chắn muốn xóa?')" ><i class="fa fa-close" aria-hidden="true"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>	
</section>
@endsection