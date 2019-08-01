@include('layouts.main')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta property="fb:app_id" content="2413901042187862"/>
	<title>Trang chủ</title>
	<link rel="stylesheet" type="text/css" href="/css/index.css">
</head>
<body >

		<div id="demo" class="carousel slide" data-ride="carousel" >

			<!-- Indicators -->
			<ul class="carousel-indicators">
				<li data-target="demo" data-slide-to="0" class="active"></li>
				<li data-target="demo" data-slide-to="1"></li>
				<li data-target="demo" data-slide-to="2"></li>
				<li data-target="demo" data-slide-to="3"></li>
			</ul>

			<!-- The slideshow -->
			<div class="carousel-inner">
				<div class="carousel-item active ">
					<img src="/images/slides/converse1.jpg" alt="Bitis Hunter" width="100%" height="500">
				</div>
				<div class="carousel-item ">
					<img src="/images/slides/adidas2.jpg" alt="Converse" width="100%" height="500">
				</div>
				<div class="carousel-item">
					<img src="/images/slides/hunter1.jpg" alt="Adidas" width="100%" height="500">
				</div>
				<div class="carousel-item">
					<img src="https://jpl.a.bigcontent.io/v1/static/desktop-top-and-bottom-banner-c4304bb8e1d506aa6cd2dc73a55697cd" alt="Adidas" width="100%" height="500">
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>

	</section>

	<div class="btn-mxh" style="text-decoration:none;">
		<a href="https://www.facebook.com/trang.ngoc.79069"><em class="fa fa-facebook-f"></em></a>
		<a href="https://www.instagram.com/huy.nq018/"><em class="fa fa-instagram"></em></a>
		<a href="#"><em class="fa fa-google"></em></a>
		<a href="#"><em class="fa fa-twitter"></em></a>
		<a href="#" id="goTop" title="TO TOP">
			<em class="fa fa-chevron-up"></em>
		</a>
	</div>

	<section id="content" class="row">
		@include('layouts/left')
		<aside class="col-md-9" style=" padding-right: 20px">
			@yield('content')
		</aside>	
	</section>

	<script>
		$(document).ready(function(){ 
			$(window).scroll(function(){ 
				if ($(this).scrollTop() > 100) { 
					$('#goTop').fadeIn(); 
				} else { 
					$('#goTop').fadeOut(); 
				} 
			}); 
			$('#goTop').click(function(){ 
				$("html, body").animate({ scrollTop: 0 }, 600); 
				return false; 
			}); 
		});
	</script>
	@include('layouts/footer')
</body>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v3.3'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="110121030321978"
  logged_in_greeting="Xin chào! Tôi có thể giúp gì cho bạn?"
  logged_out_greeting="Xin chào! Tôi có thể giúp gì cho bạn?">
</div>
</html>