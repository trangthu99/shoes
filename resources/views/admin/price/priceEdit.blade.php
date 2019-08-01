@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')

<div class="body">
	<form method="post" >
		@csrf
		
		<div >
			<h2><br><b>Chỉnh sửa đơn giá</b></h2>
		</div>
		<table class="table table-bordered table-striped mb-0" style="width: 80%;margin-left: 10%;padding-top: 5%">
			<tr>
				<th>Price name</th>
				<th>Price from</th>
				<th>Price to</th>
			</tr>
			@foreach($prices as $price)
			<tr>
				<td><input type="text" name="pricename" class="form-control" required="" value="{{$price->priceName}}"></td>			
				<td><input type="text" name="pricefrom" class="form-control" required="" value="{{$price->priceFrom}}"></td>
				<td><input type="text" name="priceto" class="form-control" required="" value="{{$price->priceTo}}"></td>
			</tr>
			@endforeach
		</table>
		<section class="form-group" style="margin-left: 30%;">
			<input type="submit" value="Xác nhận" class="btn btn-success">
			&nbsp;&nbsp;
			<input type="reset"  value="Đặt lại" class="btn btn-outline-warning">
		</section>
	</form>
</div>
@endsection
