@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')

<div class="body">
	<form method="post" >
		@csrf
		
		<div >
			<h2><br><b>Chỉnh sửa mức sale</b></h2>
		</div>

		<table class="table table-bordered table-striped mb-0">
			<tr>
				<th>Mức Sale</th>
				<th>%</th>
			</tr>
			@foreach($sales as $sale)
			<tr>
				<td><input type="text" name="sale" class="form-control" required="" value="{{$sale->sale}}"></td>			
				<td><input type="text" name="price" class="form-control" required="" value="{{$sale->price}}"></td>
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
