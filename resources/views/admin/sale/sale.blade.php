@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')


<section style="; background-color: white;">
	<a style="margin-left: 80%"  href="{{url('admin/saleInsert/')}}" class="btn btn-primary" style="margin:2%"><b>+ </b>Thêm mới</a>
	<hr>
	<table class="table table-bordered table-striped mb-0" style="width: 95%;margin: 2%" >
		<thead>
			<tr>
				<th>ID</th>
				<th>Mức sale</th>
				<th>%</th>
				<th>Tác vụ</th>
			</tr>
		</thead>
		<tbody>
			@foreach($sales as $sale)
			<tr>
				<th>{{$sale->id}}</th>
				<td>{{$sale->sale}}</td>
				<td>{{$sale->price}}</td>
			
				<td>
					<a href="{{url('admin/saleEdit/'.$sale->id)}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
					<a href="sale/delete/{{$sale->id}}" class="btn btn-danger" onclick=" confirm('Bạn chắc chắn muốn xóa?')" ><i class="fa fa-close" aria-hidden="true"></i></a>

				</td>
			</tr>
			@endforeach
			<tr>

			</tr>
		</tbody>
	</table>	
</section>
@endsection