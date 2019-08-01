<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrator</title>
	<link rel="stylesheet" href="{{asset('/css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="{{'/css/login.css'}}">
</head>
<body>
	
	<section class="container col-md-8">

		<form method="post" class="frm">
			@csrf
			<img style="width: 50%; margin-left: 25%;" src="https://orig00.deviantart.net/0d5a/f/2011/046/0/3/admin_logo_by_lucifercho-d39lpuk.png" alt="">
			<img style="width: 30%; margin-left: 35%;" src="https://png.pngtree.com/svg/20160817/2874250b9e.png" alt="">
			@if(session('alert'))
			<section class="alert alert-danger">{{session('alert')}}</section>
			@endif
			<section class="form-group">
				<label>Tên đăng nhập:</label>
				<input type="text" name="username" class="form-control" required="" >
			</section>
			<section class="form-group">
				<label>Mật khẩu:</label>
				<input type="password" name="password" class="form-control">
			</section>
			<section class="form-group">
				<input style="width: 100%;" type="submit" class="btn btn-outline-dark" value="Đăng nhập">
			</section>
		</form>
	</section>
</body>
</html>