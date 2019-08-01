@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')
<section>
	<form method="post" enctype="multipart/form-data"  style="background-color: white;width:90%;margin-left: 5%">
		@csrf
		<table class="table table-boredred" style="width: 80%;margin-left: 10%;padding-top: 5%">
			<tbody>
				<tr>
					<td>Hãng: </td>
					<td>
						<select name="brand_id">
							@foreach($hangs as $hang)
							<option value="{{$hang->id}}" >{{$hang->brandName}}</option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>
					<td>Tên sản phẩm:</td>
					<td><input name="product_name" type="text" class="form-control"></td>
				</tr>
				<tr>
					<td>Giá sản phẩm:</td>
					<td><input name="product_price" type="text" class="form-control"> 	
					</td>
				</tr>
				<tr>
					<td>Hình ảnh:</td>
					<td>
						<input type="file" name="product_image">
					</td>
				</tr>
				<tr>
					<td>Product status:</td>
					<td>
						<input type="radio" name="status" value="1">Active
						<input type="radio" name="status" value="0">Not Active
					</td>
				</tr>
				<tr>
					<td>Product description:</td>
					<td>
						<textarea name="product_description" class="form-control"></textarea>
						<script>CKEDITOR.replace('product_description');</script>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="submit" class="btn btn-success" value="Lưu">
						&nbsp;
						<input type="reset" class="btn btn-warning">
					</td>
				</tr>
			</tbody>	
		</table>
	</form>
</section>
@endsection