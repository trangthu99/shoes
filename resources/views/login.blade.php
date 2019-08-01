@include('layouts.main')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="{{'/../css/login.css'}}">
</head>
<body>
	
	<section class="container col-md-8">

		<form method="post" class="frm"  >
			@csrf
			<h2>ĐĂNG NHẬP TÀI KHOẢN</h2>
			<img src="/images/login1.png" alt="">
			@if(session('alert'))
			<section class="alert alert-danger">{{session('alert')}}</section>
			@endif
			<section class="form-group">
				<label>Tên đăng nhập:</label>
				<input type="text" name="username" class="form-control" required>
			</section>
			<section class="form-group">
				<label>Mật khẩu:</label>
				<input type="password" name="password" class="form-control" required>
			</section>
			<section class="form-group">
				<input type="checkbox" checked="checked" name="remember"> Ghi nhớ mật khẩu &nbsp;
				<a href="{{asset('/forgetPassword')}}">Quên mật khẩu</a>
			</section>
			
			<section class="form-group">
				<input style="width: 100%;" type="submit" class="btn btn-outline-dark" value="Đăng nhập">
			</section>
			<section class="form-row">

				<p>Bạn chưa có tài khoản?</p>&nbsp;
				<a href="register">Đăng ký ngay</a>
			</section>

		</form>
	</section>
</body>
</html>
