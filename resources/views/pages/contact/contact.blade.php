@extends('layout')
@section('content')
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trang-chu/')}}">Trang chủ</a></li>
                                <li><a href="{{URL::to('/gioi-thieu/')}}"  class="active">Giới thiệu</a></li>
                                <li class="dropdown"><a href="{{URL::to('/tu-sach/')}}">Tủ sách<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
                                        <li><a href="product-details.html">Product Details</a></li> 
                                        <li><a href="checkout.html">Checkout</a></li> 
                                        <li><a href="cart.html">Cart</a></li> 
                                        <li><a href="login.html">Login</a></li> 
                                    </ul>
                                </li> 
                                <li><a href="{{URL::to('/lien-he/')}}">Tác giả</a></li>
                         
                                <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                </li> 
                                <li class="dropdown"><a href="#">Thông báo<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li><a href="404.html">Giỏ hàng</a></li>
                                <li><a href="{{URL::to('/dieu-khoan-su-dung/')}}">Hỗ trợ<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu" >
                                        <li><a style ="background: none;" href="{{URL::to('/dieu-khoan-su-dung/')}}">Điều khoản sử dụng</a></li> 
                                        <li><a style ="background: none;" href="shop.html">Chính sách đổi - trả - hoàn tiền</a></li>
                                        
                                        <li><a style ="background: none;" href="checkout.html">Chính sách bảo mật</a></li> 
                                        <li><a style ="background: none;" href="cart.html">Qui định giao hàng</a></li> 
                                        <li><a style ="background: none;" href="login.html">Các câu hỏi thường gặp</a></li> 
                                    </ul></li>
                               
                            </ul>
                        </div>
                    </div>
               
                </div>
            </div>
        </div><!--/header-bottom-->
    </header>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                     <img src="{{asset('public/frontend/images/29logo.png')}}" class="girl img-responsive" alt="" />
                    <div class="left-sidebar" style="margin-top: 20px;">
                        <h2>DANH MỤC SÁCH</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                          <!--   <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Sportswear
                                        </a>
                                    </h4>
                                </div>
                                <div id="sportswear" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">Nike </a></li>
                                       
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                         
                            @foreach($category as $key => $cate)
                      
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/danh-muc-sach/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
                                </div>
                            </div>

                            @endforeach
                            
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>NHÀ PHÁT HÀNH</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                     @foreach($publisher as $key => $pub)
                                    <li><a href="{{URL::to('/danh-muc-nha-phat-hanh/'.$pub->publisher_id)}}"> <span class="pull-right">(50)</span>{{$pub->publisher_name}}</a></li>
                                    @endforeach                                
                                    </ul>
                            </div>
                        </div><!--/brands_products-->
                        <!--price-range-->
                       <!--  <div class="price-range">
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div> --><!--/price-range-->
                        
                        <div class="shipping text-center"><!--shipping-->
                            <img src="images/home/shipping.jpg" alt="" />
                        </div><!--/shipping-->
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="blog-post-area" style ="margin-top: 30px;">
                        <h2 class="title text-center">GIỚI THIỆU VỀ CỬA HÀNG SÁCH BOOK & BOOKS</h2>
                        <div class ="col-sm-6">
                            <img src="{{asset('public/frontend/images/booklogo.png')}}" style ="width: 400px;">
                        </div>   
                        <div class ="col-sm-6">
                            <img src="{{asset('public/frontend/images/booklogo.png')}}" style ="width: 400px;">
                        </div> 

                        <div class="single-blog-post">
                            <h3>Girls Pink T Shirt arrived in store</h3>
                            <div class="post-meta">
                                <ul>
                                    <li><i class="fa fa-user"></i> Mac Doe</li>
                                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                                </ul>
                                <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </span>
                            </div>
                            <a href="">
                                <img src="images/blog/blog-one.jpg" alt="">
                            </a>
                            <p>
                                 Nhasachphuongnam.com là trang thương mại điện tử của Nhà Sách Phương Nam, hệ thống nhà sách thân thuộc của nhiều gia đình Việt kể từ nhà sách đầu tiên ra đời năm 1982 đến nay.  </p> <br>

                            <p>
                                 Đến với không gian mua sắm trực tuyến nhasachphuongnam.com, khách hàng có thể dễ dàng tìm thấy những cuốn sách hay, đa thể loại của nhiều nhà xuất bản, công ty sách trong và ngoài nước cùng nhiều dụng cụ học tập, văn phòng phẩm, quà lưu niệm, đồ chơi giáo dục chính hãng của những thương hiệu uy tín. Cùng tiêu chí không ngừng hoàn thiện, nâng cao chất lượng sản phẩm, dịch vụ, Nhà Sách Phương Nam cam kết mang đến cho khách hàng trải nghiệm mua sắm trực tuyến an toàn, tiện lợi: cách đặt hàng đơn giản, phương thức thanh toán đa dạng, dịch vụ chăm sóc khách hàng tận tình, chu đáo.</p> <br>

                           
                            <div class="pager-area">
                                <ul class="pager pull-right">
                                    <li><a href="#">Pre</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class ="col-sm-6">
                            <div class="accordion" style ="background: blue;"><span>ssss</span></div>
                        </div>
                    
                    
                    
                </div>
            </div>
        </div>
    </section>
    
   @endsection