<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cửa hàng sách trực tuyến Book&Books</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/mystyle.css')}}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       

</head><!--/head-->

<body style="background: #f2f2f2;">
    <header id="header"><!--header-->

        
        <div class="header-middle" style ="background-color: #00adee;"><!--header-middle-->
            <div class="container" style ="">
                <div class="row">
                    <div class="col-sm-4">

                        <div class="logo pull-left">
                            <a href="{{URL::to('/')}}"><img src="{{asset('public/frontend/images/logo/logo.png')}}" style ="width: 400px;" alt="" /></a>
                        </div>
                       
                    </div>
                 
                    <div class="col-sm-9" >
                          <div class="social-icons pull-right">
                            <ul class="nav navbar-nav" style="float: right;">
                                @foreach($contact as $key => $value)
                                <li><a href="{{$value->company_facebook}}" target="_blank"><i class="fa fa-facebook" title ="Đến Facebook của B&B"></i></a></li>
                                <li><a href="{{$value->company_instagram}}" target="_blank"><i class="fa fa-instagram" title ="Đến Instagram của B&B"></i></a></li>
                                <li><a href="{{$value->company_youtube}}" target="_blank"><i class="fa fa-youtube-play" title ="Đến Youtube của B&B"></i></a></li>
                                @endforeach
                            </ul>
                            <br>
                          <div style="float:right;  margin-top: 10px; ">
                                <?php
                                    $name = Session::get('customer_name');
                                    if($name){
                                      
                                        ?>
                                <div class="top-nav clearfix" >
                                    <ul class="nav pull-right top-menu" >   
                                    <li class="dropdown" >
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="background:#00aeef; border-radius: 20px; padding-right: 5px; padding-left: 5px; width: 200px; height: 25px; display: -webkit-box;-webkit-box-orient: vertical;    -webkit-line-clamp: 1; overflow: hidden;">
                                            <span class="username" style="font-weight: 1000px;margin-bottom: 10px;  float: right;"><i class="fa fa-user" aria-hidden="true" style="padding: 0px; padding-right: 5px;"></i><b>
                                                    <?php
                                                        $name = Session::get('customer_name');
                                                        $customer_id = Session::get('customer_id');
                                                        if($name)
                                                            echo $name;
                                                    ?>

                                            </b></span>

                                        </a>

                                        <ul class="dropdown-menu extended logout" style="width: 30px; margin-left:50px; hover: background: #00adee;">
                                            <li><a href="{{URL::to('/gio-hang/'.$customer_id)}}" style="color: #000;"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
                                            <li ><a href="{{URL::to('/thong-tin-tai-khoan/'.$customer_id)}}" style="color: #000;"><i class="fa fa-user" aria-hidden="true"></i>Tài khoản</a></li><br>
                                       
                                            <li><a href="{{URL::to('/logout-customer')}}" style="color: #000;"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                </div>
                                    <?php   
                                        }else{
                                    ?>
                                    <a href="{{URL::to('/dang-nhap/')}}" style="color: #fff; font-weight: 900; margin-top: 0px;"><i class="fa fa-user" aria-hidden="true" style=" padding-right: 5px;"></i> Đăng nhập/Đăng ký</a>
                                    <?php
                                        }

                                ?>
                            </div></div>
                        <div class="col-sm-9" style=" margin-top: 30px; float: left;">    
                         <form action ="{{URL::to('/tim-kiem/')}}" method="POST" style="">
                            {{csrf_field()}}
                        <div class="container-4">
                            <div class="search_box pull-right" style ="margin-top: 5px;">
                                <input type ="text" name ="keyword_submit" style ="width: 400px;" value ="{{$keyword}}" placeholder="Tìm kiếm sản phẩm"/>
                                <button class="icon"><i class="fa fa-search"></i></button>
                            </div>
                        </div>   
                        </form>



                      
                    </div></div>
           
                   <!--   <div class="col-sm-7">
                        
                    </div> -->
    
                </div>
            </div>
        </div><!--/header-middle-->
    
        @yield('content')
    @foreach($contact as $key => $value)
    <footer id="footer"style="background: #F0F0E9; border-top: 1px solid #e8e8e8;" ><!--Footer-->
        <div class="footer-widget" style="margin-bottom: 10px;">
            <div class="container" style="padding-top: 0px;">
                <div class="row">

                     <div class="col-sm-6">
                        <div class="single-widget">
                             <div class="companyinfo" style="margin-top: 20px;">
                                <h2><b>CỬA HÀNG SÁCH </b><span style="color: #00adee;">BOOK & BOOKS</span></h2>
                            <p style="width: 1000px; font-size: 16px;color: #666;"><i class="fa fa-map-marker" style="margin-right: 9px; "></i> {{$value->company_address}}</p>

                            <h2 >LIÊN HỆ HỖ TRỢ</h2>
                            <p style="width: 1000px; font-size: 16px; color: #666;"><i class="fa fa-phone" style="margin-right: 7px;"></i> Hotline chăm sóc khách hàng: {{$value->company_hotline}}
                            </p>
                            <p style="width: 1000px; font-size: 16px; color: #666;">(1000đ/phút , 8-21h kể cả T7, CN)</p>
                            <p style="width: 1000px; font-size: 16px;color: #666;"><i class="fa fa-envelope-o" style="margin-right: 5px;"></i>{{$value->company_email}}</p>

                            
                        </div>
                        </div>
                    </div>
                     <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>VỀ CHÚNG TÔI</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{URL::to('/gioi-thieu')}}">Giới thiệu về B&B</a></li>
                                <li><a href="{{URL::to('/thong-bao')}}">Thông báo</a></li>
                                <li><a href="{{URL::to('/dieu-khoan-su-dung')}}">Điều khoản sử dụng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>CHÍNH SÁCH CHUNG</h2>
                            <ul class="nav nav-pills nav-stacked">
                              
                                <li><a href="{{URL::to('/chinh-sach-doi-tra')}}">Chính sách đổi - trả</a></li>
                                <li><a href="{{URL::to('/chinh-sach-bao-mat')}}">Chính sách bảo mật</a></li>
                                <li><a href="{{URL::to('/qui-dinh-giao-hang')}}">Qui định giao hàng</a></li>
                                <li><a href="{{URL::to('/cau-hoi-thuong-gap')}}">Các câu hỏi thường gặp</a></li>
                            </ul>
                        </div>
                    </div>
                   
                   
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <div class="social-icons pull-right">
                            <h2 style="margin-bottom: 0px;">Kết nối với chúng tôi</h2>
                             <ul class="nav navbar-nav" style="float: right;">
                                
                                <li><a href="{{$value->company_facebook}}" target="_blank"><i class="fa fa-facebook" style="margin: 0px;" title ="Đến Facebook của B&B"></i></a></li>
                                <li><a href="{{$value->company_instagram}}" target="_blank"><i class="fa fa-instagram" style="margin: 0px;" title ="Đến Instagram của B&B"></i></a></li>
                                <li><a href="{{$value->company_youtube}}" target="_blank" ><i class="fa fa-youtube-play" style="margin: 0px;" title ="Đến Youtube của B&B"></i></a></li>
                                @endforeach
                 
                            </ul>
        
                        </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom"  style="background: #F0F0E9; padding-bottom: 0px; border-top: 1px solid #e8e8e8;">
            <div class="container">
                <div class="row">
                    <p class="pull-left" style="font-weight: 500; width: 1000px;  font-size: 16px; color: #666663;">© 2016 - Bản quyền của Công Ty Cổ Phần Book&Books - Bookbooks.com.vn.</p><br>
                    <p class="pull-left" style="width: 1000px; font-size: 16px; padding-bottom: 10px; color: #666;">Giấy chứng nhận Đăng ký Kinh doanh số 0309532909 do Sở Kế hoạch và Đầu tư Thành phố Hồ Chí Minh cấp ngày 06/01/2010<p>
                    <p class="pull-right" style="float: right; margin-top: -20px;"><a target="_blank" href="http://online.gov.vn/Home/WebDetails/21193"><img src="{{asset('public/frontend/images/logo/congthuong.png')}}" style="width: 100px; margin-right: 20px;"></a></p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script>
         function cartnoti() {
           alert("Submit button clicked!");
           return true;
}
      </script>
  
</body>
</html>