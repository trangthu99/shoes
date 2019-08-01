@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')
<section>
	<form method="post" enctype="multipart/form-data"  style="background-color: white;width:90%;margin-left: 5%">
		@csrf
		<table class="table table-boredred" style="width: 80%;margin-left: 10%;padding-top: 5%">
			<tbody>
				<tr>
					<td>Mã sản phẩm: </td>
					<td> 
						<input type="text" name="productid" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Mã size:</td>
					<td><input name="sizeid" type="text" class="form-control"></td>
				</tr>
				<tr>
					<td>Số lượng:</td>
					<td><input name="quantity" type="text" class="form-control"> 	
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