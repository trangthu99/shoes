@extends('index')
@section('title','Home')
@section('content')
<link rel="stylesheet" href="/css/user.css">
<form method="post" id="formUser" action="{{asset('user')}}">
	<section>
		<h2>Hồ Sơ Của Tôi:</h2><br>
		<section>
			@foreach($users as $user)
			@csrf 
			<section class="form-group">
				<label>Tên đăng nhập:</label>
				<input type="text" name="username" class="form-control" value="{{$user->username}}" disabled="">
			</section>
			<section class="form-group">
				<label>Mật khẩu:</label>
				<input type="password" name="password" class="form-control" value="{{$user->password}}">
			</section>
			<section class="form-group">
				<label>Họ và tên:</label>
				<input type="text" name="fullname" class="form-control" value="{{$user->fullname}}">
			</section>

			<section class="form-group">
				<label>Điện thoại:</label>
				<input type="tel" name="mobile" class="form-control" value="{{$user->mobile}}">
			</section>

			<section class="form-group">
				<label>Email:</label>
				<input type="email" name="email" class="form-control" value="{{$user->email}}">
			</section>

			<section class="form-group">
				<label>Địa chỉ:</label>
				<textarea class="form-control" name="address" placeholder="Vui lòng nhập địa chỉ cụ thể để chúng tôi dễ dàng giao hàng đến cho bạn nhanh nhất...">{{$user->address}}</textarea>
			</section> 

			<section class="form-group">
				<input type="submit" class="btn btn-info" value="Lưu thông tin">
			</section>

			@endforeach
		</section>
	</section>
</form>
@stop