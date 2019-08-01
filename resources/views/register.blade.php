@include('layouts.main')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="{{'/../css/register.css'}}">
</head>
<body>
<section>
	<form method="post" class="register">
		<h2>ĐĂNG KÝ TÀI KHOẢN MUA HÀNG</h2>
		<img src="/images/regist.png" alt="">
		@if(session('alert'))
		<section class="alert alert-danger">{{session('alert')}}</section>
		@endif
		@csrf
		<section class="form-group">
			<label>Tên đăng nhập:</label>
			<input type="text" name="username" class="form-control" required>
		</section>
		<section class="form-group">
			<label>Mật khẩu:</label>
			<input min="6" type="password" name="password" class="form-control" required>
		</section>
		<section class="form-group">
			<label>Nhập lại mật khẩu:</label>
			<input min="6" type="password" name="repassword" class="form-control" required>
		</section>
		<section class="form-group">
			<label>Họ và tên:</label>
			<input type="text" name="fullName" class="form-control" required>
		</section>
		<section class="form-group">
			<label>Điện thoại:</label>
			<input type="number" name="mobile" class="form-control" required>
		</section>
		<section class="form-group">
			<label>Email:</label>
			<input type="email" name="email" class="form-control" required>
		</section>
		<section class="form-group">
			<label>Địa chỉ:</label>
			<textarea name="address" class="form-control" required></textarea>
		</section>
		<section class="form-group">
			<input style="width:49%" type="submit" value="Đăng ký" class="btn btn-success">
			<input style="width:49%" type="reset" value="Nhập lại" class="btn btn-warning">
		</section>
	</form>
</section>

</body>
</html>