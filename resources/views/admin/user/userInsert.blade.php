@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app/css">
@section('content')

<section>
	<form method="post" class="register">
		<h2>THÊM TÀI KHOẢN ADMIN</h2>
		
		@csrf
		<section class="form-group">
			<label>Tên đăng nhập:</label>
			<input type="text" name="username" class="form-control" required>
		</section>
		<section class="form-group">
			<label>Mật khẩu:</label>
			<input type="password" name="password" class="form-control" required>
		</section>
		<section class="form-group">
			<label for="">Status</label>
			<select name="status" id=""  class="form-control">
				<option value="1">1</option>
				<option value="0">0</option>
			</select>
		</section>
		<section class="form-group">
			<input style="width:49%" type="submit" value="Đăng ký" class="btn btn-success">
			<input style="width:49%" type="reset" value="Nhập lại" class="btn btn-warning">
		</section>
	</form>
</section>
@endsection