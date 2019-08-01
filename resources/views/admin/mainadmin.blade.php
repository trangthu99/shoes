<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/admin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<!-- Brand/logo -->
		<section class="navbar-nav mr-auto">
			<a class="navbar-brand" href="{{asset('admin')}}"><i class="	fa fa-windows" aria-hidden="true"></i> Administrator</a>

			<!-- Links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="/"><span class="oi oi-action-undo"></span><i class="fa fa-mail-forward" aria-hidden="true"></i>&nbsp;Vào trang web</a>
				</li>
			</ul>
		</section>
		<section class="navbar-nav justify-content-end">
			@if(session('userAdmin'))
			<button class="btn btn-outline-warning my-2 my-sm-0" type="button"  >
				<i class="fa fa-user">&nbsp;{{session('userAdmin')}}</i>
			</button>
			&nbsp;
			<button class="btn btn-outline-warning ">
				<a href="{{asset('admin/logout')}}" style="text-decoration: none" >Đăng xuất</a>
			</button>
			@endif
		</section>
	</nav>
	<div id="mySidenav" class="sidenav">					
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<div class="dropdown">
			<a href="#" class="dropdown-toggle ql" data-toggle="dropdown"><i class="fa fa-archive" aria-hidden="true" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"></i>&nbsp;Quản lý sản phẩm<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<a class="dropdown-item" href="{{asset('admin/products/')}}">Tất cả
				</a><hr>
				<a class="dropdown-item" href="{{asset('admin/products/brandID/1')}}">Adidas
				</a><hr>
				<a class="dropdown-item" href="{{asset('admin/products/brandID/2')}}">Bitis
				</a><hr>
				<a class="dropdown-item" href="{{asset('admin/products/brandID/3')}}">Converse
				</a><hr>
				<a class="dropdown-item" href="{{asset('admin/products/brandID/4')}}">Nike
				</a><hr>
			</ul>
		</div><hr>
		<div class="dropdown">
			<a href="#" class="dropdown-toggle ql" data-toggle="dropdown"><i class="fa fa-shopping-cart" aria-hidden="true" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"></i>&nbsp;Quản lý đơn hàng<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<a class="dropdown-item" href="{{url('admin/order')}}">Tất cả đơn hàng
				</a><hr>
				<a class="dropdown-item" href="{{url('admin/order/status/1')}}">Chưa xử lý
				</a><hr>
				<a class="dropdown-item" href="{{url('admin/order/status/2')}}">Đã đóng gói
				</a><hr>
				<a class="dropdown-item" href="{{url('admin/order/status/3')}}">Đang vận chuyển
				</a><hr>
				<a class="dropdown-item" href="{{url('admin/order/status/4')}}">Đã hoàn tất
				</a><hr>
			</ul>
		</div><hr>
		<a href="/admin/users"  class="ql"><i class="fa fa-user-circle-o " aria-hidden="true"></i>&nbsp;Quản lý User</a><hr>


		{{-- add --}}
		<div class="dropdown">
			<a href="#" class="dropdown-toggle ql" data-toggle="dropdown"><i class="fa fa-commenting" aria-hidden="true" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"></i>&nbsp;Quản lý phản hồi sản phẩm			
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<a class="dropdown-item" href="{{url('admin/rates')}}">Tất cả sản phẩm
					</a><hr>
					<a class="dropdown-item" href="{{url('admin/rate/brandID/1')}}">Adidas
					</a><hr>
					<a class="dropdown-item" href="{{url('admin/rate/brandID/2')}}">Bitis
					</a><hr>
					<a class="dropdown-item" href="{{url('admin/rate/brandID/3')}}">Converse
					</a><hr>
					<a class="dropdown-item" href="{{url('admin/rate/brandID/4')}}">Nike
					</a><hr>
				</ul>
			</div><hr>
			<a href="/admin/brands" class="ql"><i class="fa fa-handshake-o " aria-hidden="true"></i>&nbsp;Hãng sản xuất</a><hr>
			<a href="/admin/ordermethods"  class="ql"><i class="fa fa-money " aria-hidden="true"></i>&nbsp;Các phương thức thanh toán</a><hr>
			<a href="/admin/prices"  class="ql"><i class="fa fa-ticket " aria-hidden="true"></i>&nbsp;Quản lý đơn giá</a><hr>
			<a href="/admin/sales"  class="ql"><i class="fa fa-percent " aria-hidden="true"></i>&nbsp;Quản lý mức sale</a><hr>
			<div class="dropdown">
				<a href="#" class="dropdown-toggle ql" data-toggle="dropdown"><i class="fa fa-shopping-cart" aria-hidden="true" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"></i>&nbsp;Quản lý kho<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<a class="dropdown-item" href="{{asset('admin/productSizes/')}}">Tất cả
					</a><hr>
					<a class="dropdown-item" href="{{asset('admin/productSizes/brandID/1')}}">Adidas
					</a><hr>
					<a class="dropdown-item" href="{{asset('admin/productSizes/brandID/2')}}">Bitis
					</a><hr>
					<a class="dropdown-item" href="{{asset('admin/productSizes/brandID/3')}}">Converse
					</a><hr>
					<a class="dropdown-item" href="{{asset('admin/productSizes/brandID/4')}}">Nike
					</a><hr>
				</ul>
			</div><hr> 
		</div>
		<table class="table table-bordered">
			<tbody>
				<tr>

					<td id="content">
						<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
					</td>
					<td >@yield('content')</td>
				</tr>
			</tbody>
		</table>
		<script>
			function openNav() {
				document.getElementById("mySidenav").style.width = "280px";
				document.getElementById("content").style.width = "280px";
			}

			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
				document.getElementById("content").style.width = "0";
			}
		</script>

	</body>
	</html>