@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')
<section>
	<form method="post" enctype="multipart/form-data" style="background-color: white;width:90%;margin-left: 5%">
		@csrf
		<table class="table table-boredred" style="width: 80%;margin-left: 10%;padding-top: 5%" >
			<tbody>
				<tr>
					<td>Hãng: </td>
					<td>
						<select name="brandId">
							@foreach($brands as $brand)
							<option value="{{$brand->id}}"<?=$brand->id!=$product->brandId?:'selected'?>>{{$brand->brandName}}</option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>
					<td>Tên sản phẩm:</td>
					<td><input name="productName" type="text" value="{{$product->productName}}" class="form-control"></td>
				</tr>
				<tr>
					<td>Giá sản phẩm:</td>
					<td><input name="productPrice" type="text" value="{{$product->productPrice}}" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Hình ảnh:</td>
					<td>
						<img width="30%" src="{{asset('/images/'.$product->productImage)}}">
						Thay đổi hình ảnh:
						<input type="file" name="productImage">
					</td>
				</tr>
				<tr>
					<td>Product status:</td>
					<td>
						<input type="radio" name="status" value="1"<?=$product->status!=1?:'checked'?>>Active
						<input type="radio" name="status" value="0"<?=$product->status!=0?:'checked'?>>Not Active
					</td>
				</tr>
				<tr>
					<td>Product description:</td>
					<td>
						<textarea name="productDescription" class="form-control">{{$product->productDescription}}</textarea>
						<script>CKEDITOR.replace('productDescription');</script>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="submit" class="btn btn-success">
						&nbsp;
						<input type="reset" class="btn btn-warning"></td>
					</tr>
				</tbody>	
			</table>
		</form>
	</section>
@endsection