<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Trang quản lý cửa hàng sách B&B</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.js')}}"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body style ="background: #f5f5f5;">
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix" style ="background: #fff;">
<!--logo start-->
<div class="brand" style="background-color: #00aeef;">
    <a class="logo" href="{{URL::to('/dashboard')}}">
        <b>ADMIN</b>
    </a>

</div>
<!--logo end-->


<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">

        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="background:#00aeef; border: 1px solid #00aeef; ">
                <img alt="" src="{{asset('public/backend/images/2.png')}}">
                <span class="username">
                        <?php
                            $name = Session::get('admin_name');
                            if($name)
                                echo $name;
                        ?>

                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout" style="margin-top: -15px;">
              <!--   <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li> -->
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i>Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
                 <li class="sub-menu">
                    <a href="{{URL::to('/all-order')}}">
                        <i class="fa fa-window-maximize" aria-hidden="true"></i>
                        <span>Đơn hàng</span>
                    </a>
                </li>
                   <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sách</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-book')}}">Thêm sách</a></li>
                        <li><a href="{{URL::to('/all-book')}}">Liệt kê sách</a></li>
                    </ul>
                </li>

                  <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        <span>Tác giả</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-author')}}">Thêm tác giả</a></li>
                        <li><a href="{{URL::to('/all-author')}}">Liệt kê tác giả</a></li>
                        <li><a href="{{URL::to('/add-book-author')}}">Thêm sách cho tác giả</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <span>Tag</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/favorite')}}">Sách yêu thích</a></li>
                        <li><a href="{{URL::to('/selling')}}">Sách bán chạy</a></li>
                        <li><a href="{{URL::to('/hl-book')}}">Điểm sách</a></li>
                        <li><a href="{{URL::to('/hl-auth')}}">Tác giả nổi bật</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                        <span>Bài viết</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-news')}}">Thêm bài viết</a></li>
                        <li><a href="{{URL::to('/all-news')}}">Liệt kê bài viết</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <span>Banner</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-banner')}}">Thêm banner</a></li>
                        <li><a href="{{URL::to('/all-banner')}}">Liệt kê banner</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-tasks"></i>
                        <span>Danh mục tác phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục</a></li>
                    </ul>
                </li>

                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-building-o" aria-hidden="true"></i>
                        <span>Nhà phát hành</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-publisher')}}">Thêm Nhà phát hành</a></li>
						<li><a href="{{URL::to('/all-publisher')}}">Liệt kê Nhà phát hành</a></li>
                    </ul>
                </li>         
                  
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <span>Thông tin chung</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/all-bb-post')}}">Bài viết</a></li>
                        <li><a href="{{URL::to('/all-contact')}}">Liên hệ</a></li>
                        <li><a href="{{URL::to('/all-company-info')}}">Công ty</a></li>
                    </ul>
                </li>
            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
    @yield('admin_content')	
		
</section>

</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script type ="text/javascript">
    CKEDITOR.replace('ckeditor');
    CKEDITOR.replace('ckeditor1');
    CKEDITOR.replace('ckeditor2');

</script>

<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth: false,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>

</body>
</html>
