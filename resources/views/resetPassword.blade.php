@include('layouts.main')

<link rel="stylesheet" type="text/css" href="/css/login.css">

	<section class="container col-md-8">
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<form method="post" class="frm" action="/reset_password">
			@csrf
			<h3 style="text-align: left;" ><b>Đặt lại mật khẩu của bạn</b></h3>
			<hr>
			<section class="form-group">
				<label style="color:#32a0a8" >Mã xác nhận</label>
				<input type="text" name="token" class="form-control"  required>
			</section>
			<section class="form-group">
				<label style="color:#32a0a8" >Mật khẩu mới</label>
				<input type="password" name="password" class="form-control" required autocomplete="false">
			</section>
			<section class="form-group">
				<label style="color:#32a0a8" >Nhập lại mật khẩu mới</label>
				<input type="password" name="password_confirmation" class="form-control" required>
			</section>
				<br>
			<section>
				<input style="width: 25%;" type="submit" class="btn btn-info" value="Gửi">
			</section>
		</form>
	</section>
	
