<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ $title ?? "" }}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/footer.css">
	@stack("styles")
<!-- 	<style>	
		#popup_banner_beta{position:fixed;width:100%;height:100vh;z-index:99999;top:0;left:0}.mask_popup_banner_beta{background:rgba(0,0,0,.38);cursor:pointer;position:absolute;width:100%;height:100vh;top:0;z-index:9;left:0}.content_popup_banner_beta{position:absolute;top:50%;left:50%;z-index:10;transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);-webkit-transform:translate(-50%,-50%)}.close_icon{position:absolute;top:-70px;right:-60px;width:70px;cursor:pointer}@media only screen and (max-width:480px){.content_popup_banner_beta{width:300px}.content_popup_banner_beta a img:nth-of-type(1){width:100%}.close_icon{top:-60px;right:-20px;width:50px}}
	</style> -->
</head>
<body>
	<footer>
		<div class="row" style="width: 50%;margin:auto;">

			
			<div class="col-md-3">
				<a href="{{asset('search/brandID/1')}}"><img src="{{asset('/images/logo_adidas.png')}}" class="adidas" style="width: 50%;padding-top: 10px" ></a>
			</div>
			<div class="col-md-3">
				<a href="{{asset('search/brandID/3')}}"><img src="{{asset('/images/logo_converse.png')}}" class="converse" style="width: 60%;padding-top: 10px"></a>
			</div>
			<div class="col-md-3">
				<a href="{{asset('search/brandID/4')}}"><img src="{{asset('/images/logo_nike.png')}}" class="nike" style="width: 70%;padding-top: 20px"></a>
			</div>
			
			<div class="col-md-3">
				<a href="{{asset('search/brandID/2')}}"><img src="https://salt.tikicdn.com/ts/categorybanner/c2/71/b0/7198b098997111bb3ca2c070440bf89f.png" alt="" style="width: 70%;"></a>
			</div>
		</div>
		<div class="row footer1">
			<div class="col-md-3">
				<div id="map" >
					<iframe title="Địa chỉ" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.906716608819!2d105.78482261403335!3d21.036418185994155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4a09771445%3A0x6a77d678deb93a98!2zMzIgWHXDom4gVGjhu6d5LCBE4buLY2ggVuG7jW5nIEjhuq11LCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1562728115302!5m2!1svi!2s"  width="90%" height="170" frameborder="0"  style="border:0" allowfullscreen ></iframe>
					
				</div>
			</div>

			<div class="col-md-3 "  style="margin-top: 60px" >
				<strong style="color: black;font-family: 'Segoe-Ui-Semibold';"> HỆ THỐNG CỬA HÀNG</strong>
				<br>
				<ul>
					<li>Cơ sở 1:<i>  Số 32 Xuân Thủy-Cầu Giấy-Hà Nội </i></li>
					<li>Cơ sở 2:<i> Số 2 Cầu Giấy-Hà Nội </i></li>

					<li>Cơ sở 3:<i>  Số 6 ngõ 79 Hoàng Mai-Hà Nội </i></li>
				</ul>
			</div>
			<div class="col-md-3" style="margin-top: 40px;padding-left: 40px">
				<div >
					<i style="color: #febe10;width: 50px; font-size: 60px;margin-right: 5px " class="fa fa-whatsapp"></i>
				</div>
				<div>
					<strong style="font-family: 'Segoe-Ui-Semibold';">GỌI MUA HÀNG(8:30-21:30)</strong>
					<br>
					<a href="tel:0373872918" title="Hotline" style="color: #febe10;font-family: 'UTM-Avo-Bold';
					font-size: 15px;text-decoration:none; "><b>0373872918</b></a>
					<br>
					<span>Tất cả các ngày trong tuần</span>
				</div>
			</div>
			<div class="col-md-3" style="margin-top: 40px">
				<div >
					<i style="color: #febe10;width: 50px; font-size: 60px; margin-right: 5px " class="fa fa-whatsapp"></i>
				</div>
				<div>
					<strong style="font-family: 'Segoe-Ui-Semibold';">GÓP Ý, KHIẾU NẠI(8:30-21:30)</strong>
					<br>
					<a href="tel:0373872918" title="Hotline" style="color: #febe10;font-family: 'UTM-Avo-Bold';
					font-size: 15px;text-decoration:none; "><b>0373872918</b></a>
					<br>
					<span>Nghỉ chiều thứ 7, chủ nhật, các ngày lễ</span>
				</div>
			</div>
		</div>
		<div class="footer2">
			<div class="i">
				<ul >
					<li>
						<span style="padding-right: 21px;padding-left: 21px">|</span>
					</li>
					<li>
						<a href=""><small>Chính sách bảo mật</small></a>
					</li>
					<li>
						<span style="padding-right: 21px;padding-left: 21px">|</span>
					</li>
					<li>
						<a href=""><small>Điều khoản và điều kiện</small></a>
					</li>
					<li>
						<span style="padding-right: 21px;padding-left: 21px">|</span>
					</li>
					<li>
						<a href=""><small>@2019</small></a>
					</li>
				</ul>
			</div>

			

		</footer>
	</body>
	

	</html>