<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ $title ?? "" }}</title>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	@stack("styles")
</head>
<body>
	<nav id="navbar"  class="navbar navbar-expand-sm navbar-dark navbar-static-top nav">
		<!-- Links -->
		<ul class="navbar-nav">
			<li class="navbar-item mr-2" style="width: 30%;">
				<img style="width: 25%; padding-bottom: 3%;" src="/images/logo.png" alt="">&nbsp;
				<a  class="navbar-brand" href="/" style="padding-top: 10px;"><h3 class="hutra">HUTRA SHOES</h3><small>Uy tín & Chất lượng</small></a>
			</li>
			<li class="navbar-item search">
				<form class="form-inline" method="get" action="{{url('search/keyword/key')}}">
					<input style="	width: 300px;" type="search" name="keyword" class="form-control mr-2" placeholder="Tìm kiếm sản phẩm..."> 
{{-- 					<input type="submit" value="search" class="btn btn-success"> --}}
				</form>
			</li>
		</ul>
		<ul class="navbar-nav" id="nav">
			<li class="nav-item active">
				<a class="nav-link" href="/"><i class="fa fa-home"></i>&nbsp;Trang chủ</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{asset('search/brandID/1')}}">Adidas</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{asset('search/brandID/2')}}">Bitis Hunter</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{asset('search/brandID/3')}}">Converse</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{asset('search/brandID/4')}}">Nike</a>
			</li>
			<li class="nav-item">
				<a href="{{asset('/help')}}" class="nav-link"><i class="fa fa-question-circle-o"></i>&nbsp;Hướng dẫn chọn giày</a>
			</li>
		</ul>
		<ul class="navbar-nav">
			<li></li>
		</ul>
	</nav>
	<nav id="line" class="navbar navbar-expand-sm navbar-static-top ship">
		<ul class="navbar-nav mr-auto">
			<img width="20" src="/images/call.gif">&nbsp;<b>Hotline: 0394366374 | 0373872918</b>&nbsp;&nbsp;
			<img width="40" src="/images/ship.gif">&nbsp;<b>Giao hàng miễn phí nội thành</b>
		</ul>
		<ul class="navbar-nav justify-content-end">
			@if(session('user'))
			<li class="nav-item">				
				<a class="nav-link" href="{{url('cart')}}" style="color:black; font-weight: bold;"><i class="fa fa-shopping-cart" style="font-size:20px;color:orange;"></i>&nbsp;Giỏ hàng của tôi</a>
			</li>

			<li class="nav-item">				
				<a class="nav-link" href="{{url('order/follow')}}" style="color:black; font-weight: bold;"><i class="fa fa-podcast" style="font-size:20px;color:orange;"></i>&nbsp;Theo dõi đơn hàng</a>
			</li>

			<div class="dropdown dropleft">
				<button class="btn btn-outline-info my-2 my-sm-0 dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-user">&nbsp;{{session('user')}}</i>
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
					<a href="/logout" class="dropdown-item">Đăng xuất</a>
					<a href="/user" class="dropdown-item">Tài khoản của tôi</a>
				</div>
			</div>
			@else

			<li class="nav-item user">

				<a class="nav-link" href="{{url('login')}}"><i class="fa fa-user-circle-o" style="font-size:20px;color:orange;"></i>&nbsp;Đăng nhập</a>
			</li>
			&nbsp;
			<li class="nav-item user">
				<a class="nav-link" href="{{url('register')}}"><i class="fa fa-user-plus" style="font-size:20px;color:orange;"></i>&nbsp;Đăng ký</a>
			</li>
			@endif
		</ul>
	</nav>



	<a href="" class="btn-call-now" style="text-decoration:none;">
		<em class="fa fa-phone">
			&nbsp;
		</em>
		<span class="lienhe">Liên hệ ngay 0373872918</span>
	</a>
	<script src="/js/app.js?v={{env('APP_ENV') == 'local' ? time() : base64(2)}}"></script>
	@stack("scripts")
	<script>
		window.onscroll = function() {myFunction()};

		var nav = document.getElementById("nav");
		var sticky = nav.offsetTop;

		function myFunction() {
			if (window.pageYOffset > sticky) {
				nav.classList.add("sticky");
			} else {
				nav.classList.remove("sticky");
			}
		}
	</script>


</body>
</html>