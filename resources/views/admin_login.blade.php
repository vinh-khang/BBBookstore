<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Trang quản lý B&B </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body style="background-color: #045de9;
background-image: linear-gradient(315deg, #045de9 0%, #09c6f9 74%);">

<div class="log-w3" style ="height: 620px;">
<div class="w3layouts-main" style ="padding-bottom:10px;" >
	<h2 style ="background: #00adee; padding: 10px; border-radius: 5px 5px 0px 0px;" ><i class="fa fa-user-circle" aria-hidden="true"></i> Đăng nhập admin</h2>
	
		<form action="{{URL::to('/admin-dashboard')}}" method="post" style ="margin-top: 30px;">
			{{csrf_field()}}
			<h1 style ="font-size: 15px; color: #000;">Tên đăng nhập:</h1>
			<input type="text" class="ggg" name="admin_code" placeholder="Vui lòng điền tên đăng nhập" required="" style="border-radius: 3px;">
			<h1 style ="font-size: 15px; color: #000;">Mật khẩu:</h1>
			<input type="password" class="ggg" name="admin_password" placeholder="Vui lòng điền mật khẩu" required="" style="border-radius: 3px;">
		

				<input type="submit" value="Đăng nhập" name="login">
					<div style="color: red; "><b>
			<?php
				$message = Session::get('message');
				if($message){
					echo $message;
					Session::put('message',null);}
			?></b>
			</div>
		</form>
		<!-- <p>Ban chưa có tài khoản ?<a href="registration.html">Tạo tài khoản</a></p> -->
</div>
<audio controls><source src ="{{asset('public/upload/music/a.mp3')}}" type="audio/mpeg">	
<p>Fallback content goes here.</p></audio>
</div>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
