@include('layouts.main')

<link rel="stylesheet" type="text/css" href="/css/login.css">

	<section class="container col-md-8">
		
		<form method="post" class="frm"  >
			@csrf
			<h3 style="text-align: center;" ><b>Gửi mail xác nhận</b></h3>
			<hr>
			@if(session('alertt'))
			<section class="alert alert-danger">{{session('alertt')}}</section>
			@endif
			<section class="form-group">
				<label style="color:#32a0a8" >Vui lòng nhập email hoặc số điện thoại để tìm tài khoản:</label>
				<input type="text" name="email" class="form-control" required>
				<br>
			<section style="text-align: center;">
				<input style="width: 25%;" type="submit" class="btn btn-info" value="Gửi">
				<input style="width: 25%;" type="reset" class="btn btn-warning" value="Đặt lại">
			</section>
		</form>
	</section>
</body>
</html>
