@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app/css">
@section('content')

<section>
	<form method="post" class="register">
		<h2>THÊM MỨC SALE</h2>
		
		@csrf
		<section class="form-group">
			<label>Mức sale:</label>
			<input type="text" name="sale" class="form-control" required>
		</section>
		<section class="form-group">
			<label>Price :</label>
			<input type="text" name="price" class="form-control" required>
		</section>
		<section class="form-group">
			<input style="width:49%" type="submit" value="Thêm" class="btn btn-success">
			<input style="width:49%" type="reset" value="Nhập lại" class="btn btn-warning">
		</section>
	</form>
</section>
@endsection