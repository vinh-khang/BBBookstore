@extends('layout')
@section('content')

<!-- Sách mới -->
<div class="header-bottom" style =""><!--header-bottom-->
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
                                <li><a href="{{URL::to('/trang-chu/')}}" class="active">Trang chủ</a></li>
                                <li><a href="{{URL::to('/gioi-thieu/')}}">Giới thiệu</a></li>
                                <li class="dropdown"><a href="{{URL::to('/tu-sach/')}}">Tủ sách<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($category as $key => $cate)
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/danh-muc-sach/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li> 
                                <li><a href="{{URL::to('/tac-gia/')}}">Tác giả</a></li>
                         
                                <li class="dropdown"><a href="{{URL::to('/tin-moi/')}}">Tin mới<i class="fa fa-angle-down"></i></a>
                                 <ul role="menu" class="sub-menu">
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/tin-tuc/')}}">Tin tức</a></li> 
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/diem-sach/')}}">Review sách</a></li>
                                        
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/thong-bao/')}}">Thông báo</a></li> 
                                       
                                    </ul></li> 
                             
                             <!--    <li><a href="404.html">Giỏ hàng</a></li> -->
                                <li><a href="{{URL::to('/dieu-khoan-su-dung/')}}">Hỗ trợ<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/dieu-khoan-su-dung/')}}">Điều khoản sử dụng</a></li> 
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/chinh-sach-doi-tra/')}}">Chính sách đổi - trả - hoàn tiền</a></li>
                                        
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/chinh-sach-bao-mat/')}}">Chính sách bảo mật</a></li> 
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/qui-dinh-giao-hang/')}}">Qui định giao hàng</a></li> 
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/cau-hoi-thuong-gap/')}}">Các câu hỏi thường gặp</a></li> 
                                    </ul></li>
                             
                            </ul>
                        </div>
                        <!-- Đăng nhập -->
                         
                    </div>
               
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
    <section id="slider" style="margin-left: 15px;"><!--slider-->
        <div class="container">
            <div class="row">
      
                 <div class="col-sm-3">
                     <img src="{{asset('public/frontend/images/logo/29logo.png')}}" class="girl img-responsive" alt="" />
                 </div>

                <div class="col-sm-9" style="float:right;">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                            <li data-target="#slider-carousel" data-slide-to="3"></li>
                        </ol>
                        
                        <div class="carousel-inner" style ="height: 200px;">
                            @foreach($banner1 as $key=>$b1)
                            <div class="item active">
                                
                                <div class="col-sm-9" style="width: 930px; padding-right: 0px; padding-left: 0px; float:right;">
                                    <img src="{{asset('public/upload/banner/'.$b1->banner_image)}}" class="girl img-responsive" alt="" style=""/>
                                </div>
                            </div>
                            @endforeach
                            @foreach($banner2 as $key=>$b2)
                            <div class="item">
                     
                                <div class="col-sm-9" style="width: 930px; padding-right: 0px; padding-left: 0px; float:right;">
                                    <img src="{{asset('public/upload/banner/'.$b2->banner_image)}}" class="girl img-responsive" alt="" style=""/>
                                </div>
                            </div>
                            @endforeach

                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left" ></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        
                          <div class="panel-group category-products" id="accordian" style="background: #fff; border-radius: 5px;"><!--brands_products-->
                            <h2 style ="margin:0px; text-align: center;">DANH MỤC SÁCH</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                     @foreach($category as $key => $cate)
                                    <div class="panel panel-default" style="background: #fff;">
                                        <div class="panel-heading" style="background: #fff;">
                                            <h4 style="margin-left:0px;" class="panel-title"><a href="{{URL::to('/danh-muc-sach/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
                                </div>
                            </div>
                                    @endforeach                                
                                    </ul>
                            </div>
                        </div>
                        <!--/category-products-->


                        <!-- Sách bán chạy -->

                        <div class="panel-group category-products" id="accordian" style="background: #fff; border-radius: 5px;">  
                            <h2 style ="margin:0px; font-size: 14px;">SÁCH BÁN CHẠY TRONG TUẦN</h2>
                            <div class="brands-name" style="padding: 0px;">
                                <ul class="nav nav-pills nav-stacked">
                                     @foreach($selling as $key => $sell)
                                     <a href ="{{URL::to('chi-tiet-sach/'.$sell->book_id)}}">
                                        <div class="col-sm-3" style="width: 40%; height: 100px; margin-top: 20px;">
                                            <div class="product-image-wrapper" style="border: none;">
                                                <div class="single-products" style ="height: 100px;">
                                                        <div class="">                                                 
                                                            <img src="{{URL::to('/public/upload/book/'.$sell->book_image)}}" alt="" style ="height: 100px; width: 70px"></div>
                                                </div>
                                            </div>
                                        </div></a>
                                            <div class="col-sm-3" style="width: 60%; height: 100px; margin-top: 30px; padding: 0px;">
                                                <h4 class="panel-title" style="display: -webkit-box;-webkit-box-orient: vertical;    -webkit-line-clamp: 2;overflow: hidden;">
                                                <a href="{{URL::to('/chi-tiet-sach/'.$sell->book_id)}}">{{$sell->book_name}}</a>
                                                </h4>
                                                <h5 style="opacity: 0.7;">{{$sell->author}}</h5>
                                                <h5 style ="color: #428bca; margin-top: 10px;">{{number_format($sell->book_price).' '.'đ'}}</h5>
                                            </div>
                               @endforeach                                
                                </ul>
                            </div>
                        </div>

                            <!-- Hết -->
                             <div class="panel-group category-products" id="accordian" style="background: #fff; border-radius: 5px; "><!--brands_products-->
                            <h2 style ="margin:0px; text-align: center;">TIN TỨC MỚI</h2>
                            <div class="brands-name" style="padding-top: 0px;">
                                <ul class="nav nav-pills nav-stacked">
                                    <div class="panel panel-default" style="background: #fff;">
                                            @foreach($news as $key => $value)
                                            <h5 style="margin-left:0px; padding: 10px 10px 10px 10px; text-transform: none; color: #7d7d7d;" class="panel-title" style=""><a style ="background: none; margin: 0px; " href="{{URL::to('/xem-tin/'.$value->news_id)}}">{{$value->news_title}}</a></h5>
                                            @endforeach

          
                                    </div>
                          
                                </ul>
                            </div>
                        </div>
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
<div class="col-sm-12" style="padding: 0px;">


<div class="features_items" style="background: #fff; border-radius: 5px; padding-top: 10px;"><!--features_items-->
            <h2 class="title text-center" style ="padding-bottom: 5px;  color: #666; text-align: left; border-bottom: 4px solid #00adee;"><i class="fa fa-bookmark" aria-hidden="true" style ="color: #00adee;margin-right: 10px;"></i>SÁCH MỚI</a></h2>

               <div id="recommended-item-carousel" class="carousel slide" data-interval="false" style ="">
                    <div class="carousel-inner" style ="interval: false;">
                      <div class="item active">      
                        @foreach($new_book as $key => $nb)

                        <a href ="{{URL::to('chi-tiet-sach/'.$nb->book_id)}}">
                        <div class="col-sm-4" style="width: 25%; height: 370px;">
                            <div class="product-image-wrapper" style ="background: #fff;">
                                <div class="single-products" style ="height: 350px;">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('/public/upload/book/'.$nb->book_image)}}" alt="" height =200 >
                                            
                                            <p style ="">{{$nb->book_name}}</p>

                                            <p style ="opacity: 0.7;">{{$nb->author}}</p>
                                            <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;">{{number_format($nb->book_price).' '.'đ'}}</h2>
                                            
                                        </div>
                                   
                              
                                </div>
                            </div>
                        </div></a>

                        @endforeach
                    </div>

                               <div class="item">      
                        @foreach($new_book_2 as $key => $nb2)
                      
                        <a href ="{{URL::to('chi-tiet-sach/'.$nb2->book_id)}}">
                        <div class="col-sm-4" style="width: 25%; height: 370px;">
                            <div class="product-image-wrapper" style ="background: #fff;">
                                <div class="single-products" style ="height: 350px;">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('/public/upload/book/'.$nb2->book_image)}}" alt="" height =200 >
                                            
                                            <p style ="">{{$nb2->book_name}}</p>
                                              <p style ="opacity: 0.7;">{{$nb2->author}}</p>
                                            <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;">{{number_format($nb2->book_price).' '.'đ'}}</h2>
                                            
                                        </div>
                            
                                </div>
                            </div>
                        </div></a>

                        @endforeach
                    </div>


                        
                        
                    </div>
                             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>          
                        </div>
</div></div>

<!-- Sách yêu thích -->
<div class="col-sm-12" style="padding: 0px;">
<div class="features_items" style="background: #fff;  border-radius: 5px; margin-top: 10px; padding-top: 10px;">
            <h2 class="title text-center" style ="padding: 5px; color: #666; text-align: left; border: 0px; border-bottom: 4px solid #00adee;"><i class="fa fa-heart" aria-hidden="true" style ="color: #00adee;margin-right: 5px;"></i>SÁCH YÊU THÍCH<a href="{{URL::to('/sach-yeu-thich')}}" style="float: right; text-transform: none; font-size: 16px; font-weight: 600;">Xem thêm...</a></h2>

               <div id="literature-item-carousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                      <div class="item active" style ="">      
                        @foreach($favorite as $key => $yeu)

                        <a href ="{{URL::to('chi-tiet-sach/'.$yeu->book_id)}}">
                        <div class="col-sm-4" style="width: 25%; height: 370px;">
                            <div class="product-image-wrapper" style ="background: #fff;">
                                <div class="single-products" style ="height: 350px;">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('/public/upload/book/'.$yeu->book_image)}}" alt="" height =200 >
                                            
                                            <p style ="">{{$yeu->book_name}}</p>
                                            <p style ="opacity: 0.7;">{{$yeu->author}}</p>
                                            <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;">{{number_format($yeu->book_price).' '.'đ'}}</h2>
                                            
                                        </div>
                                   
                              
                                </div>
                            </div>
                        </div></a>

                        @endforeach
                    </div>

                               <div class="item">      
                        @foreach($favorite_2 as $key => $yeu2)
                      
                        <a href ="{{URL::to('chi-tiet-sach/'.$yeu2->book_id)}}">
                        <div class="col-sm-4" style="width: 25%; height: 370px; ">
                            <div class="product-image-wrapper" style ="background: #fff;">
                                <div class="single-products" style ="height: 350px;">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('/public/upload/book/'.$yeu2->book_image)}}" alt="" height =200 >
                                            
                                            <p style ="">{{$yeu2->book_name}}</p>
                                            <p style ="opacity: 0.7;">{{$yeu2->author}}</p>
                                            <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;">{{number_format($yeu2->book_price).' '.'đ'}}</h2>
                                            
                                        </div>
                            
                                </div>
                            </div>
                        </div></a>

                        @endforeach
                    </div>


                        
                        
                    </div>
                             <a class="left recommended-item-control" href="#literature-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right recommended-item-control" href="#literature-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>          
                        </div>
</div></div>


<!-- Điểm sách -->
<div class="col-sm-9" style="padding: 0px; width: 50%;">

<div class="features_items" style="background: #fff; border-radius: 5px; margin-top: 10px; padding-top: 10px; height: 325px;">
    <h2 class="title text-center" style ="padding: 5px; color: #666; text-align: left; border-bottom: 4px solid #00adee; margin-bottom: 10px;"><i class="fa fa-book" aria-hidden="true" style ="color: #00adee;margin-right: 10px;"></i>ĐIỂM SÁCH</a></h2>
   @foreach($hl_book as $key => $value)
                        <a href ="{{URL::to('chi-tiet-sach/'.$value->book_id)}}">
                        <div class="col-sm-6" style="width: 50%; height: 300px; padding: 0px;">
                            <div class="product-image-wrapper" style="border: none;">
                                <div class="single-products" style ="height: 350px;">
                                        <div class="productinfo text-center">                                            
                                            
                                            <img src="{{URL::to('/public/upload/book/'.$value->book_image)}}" alt="" height =200 width="160"  style ="">                                                           
                                        </div>

                                </div>
                            </div>
                        </div></a>
                        <div class="col-sm-6" style="padding-left: 0px;">
                             <a href ="{{URL::to('chi-tiet-sach/'.$value->book_id)}}"  style="display: -webkit-box; -webkit-box-orient: vertical;
                             -webkit-line-clamp: 2; overflow: hidden; "><b style=" font-size: 16px;">{{$value->book_name}}</b></a>
                             <h5 style="opacity: 0.7;">{{$value->author}}</h5>
                             <span style="display: -webkit-box; -webkit-box-orient: vertical;
                             -webkit-line-clamp: 5; overflow: hidden; margin-top: 10px; margin-bottom: 10px;">
                             {!!$value->book_desc!!}   
                             </span>
                             <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;">{{number_format($value->book_price).' '.'đ'}}</h2>
                        </div>
                        <span style=""></span>
                        @endforeach
</div></div>


<div class="col-sm-9" style="width: 50%; float: right; padding-right: 0px;">
<h2 class="title text-center" style =" color: #666; margin-top: 15px; margin-bottom: 10px;">SÁCH TƯƠNG TỰ</h2>


   @foreach($hl_book2 as $key => $value)
   <div class="features_items" style="background: #fff; border-radius: 5px; padding:10px; margin-top: 10px;">
                            <div class="col-sm-6" style="padding: 0px; width: 23%;">
                             <a href ="{{URL::to('chi-tiet-sach/'.$value->book_id)}}">
                                            <div class="product-image-wrapper" style="border: none;">
                                                <div class="single-products" style ="height: 100px;">
                                                        <div class="">                                                 
                                                            <img src="{{URL::to('/public/upload/book/'.$value->book_image)}}" alt="" style ="height: 100px; width: 70px"></div>
                                                </div>
                                        
                                        </div></a></div>

                            <div class="col-sm-9" style="padding-left: 0px;">
                             <a href ="{{URL::to('chi-tiet-sach/'.$value->book_id)}}"  style=""><b style=" font-size: 16px;">{{$value->book_name}}</b></a>
                            <h5 style="opacity: 0.7;">{{$value->author}}</h5>

                         <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;">{{number_format($value->book_price).' '.'đ'}}</h2></div>

                             </div>
                        @endforeach
</div>
<!-- Hết -->

<!-- Tác giả nổi bật -->
<div class="col-sm-12" style="padding: 0px;">
<div class="features_items" style="background: #fff;  height: 270px; border-radius: 5px;  margin-top: 10px; padding-top: 10px;">
    <h2 class="title text-center" style ="padding: 5px; color: #666; text-align: left; border-bottom: 4px solid #00adee; margin-bottom: 10px;"><i class="fa fa-user" aria-hidden="true" style ="color: #00adee;margin-right: 10px;"></i>TÁC GIẢ NỔI BẬT</a></h2>
   @foreach($author as $key => $auth)
                        <a href ="{{URL::to('chi-tiet-tac-gia/'.$auth->author_id)}}">
                        <div class="col-sm-4" style="width: 25%; height: 300px;">
                            <div class="product-image-wrapper" style="border: none;">
                                <div class="single-products" style ="height: 350px;">
                                        <div class="productinfo text-center" >                                            
                                            
                                            <img src="{{URL::to('/public/upload/author/'.$auth->author_image)}}" alt="" style ="border-radius: 180px; padding: 7px; background: #e3e3e3; width: 100%; height: 180px; width: 180px;">                                                           
                                        </div>

                                </div>
                            </div>
                        </div></a>
                        <div class="col-sm-9">
                             <a href ="{{URL::to('chi-tiet-tac-gia/'.$auth->author_id)}}"  style=""><b style=" font-size: 16px;">Tác giả: {{$auth->author_name}}</b></a>
                             <br>
                             <span style="display: -webkit-box; -webkit-box-orient: vertical;
                             -webkit-line-clamp: 5; overflow: hidden; margin-top: 10px; margin-bottom: 10px;"><p style=" font-size: 16px;">
                             {!!$auth->author_biography!!}</p>   
                             </span>
                        </div>
                        <span style=""></span>
                        @endforeach
                        @foreach($auth_book as $key => $ab)
                        <div class="col-sm-4" style="width: 23%; padding: 0px; margin-left: 15px;">          
                            <a href="{{URL::to('chi-tiet-sach/'.$ab->book_id)}}"><p style ="display: -webkit-box; -webkit-box-orient: vertical;
                             -webkit-line-clamp: 2; overflow: hidden; margin-bottom: 5px; font-size: 16px; color: #666; font-weight: 600;"></i>{{$ab->book_name}}</p></a>
                        </div>

                        @endforeach
</div></div>

<!-- DANH MỤC NỔI BẬT -->
<div class="col-sm-12" style="padding: 0px;">
<div class="category-tab shop-details-tab" style="background: #fff; border-radius: 5px;  margin: 10px 0px 10px 0px; height: 490px; padding-top: 10px;"><!--category-tab-->
                        <div class="col-sm-12">
                             <h2 class="title text-center" style ="color: #666; text-align: left;  margin-bottom: 7px;"><i class="fa fa-tasks" aria-hidden="true" style ="color: #00adee;margin-right: 10px;"></i>DANH MỤC NỔI BẬT</a></h2>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#vanhoc" data-toggle="tab">Văn học</a></li>
                                <li><a href="#kinhte" data-toggle="tab">Kinh tế</a></li>
                                <li><a href="#tamly" data-toggle="tab">Tâm lý - Giáo dục</a></li>
                                <li><a href="#khoahoc" data-toggle="tab">Kiến thức - Khoa học</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="vanhoc" >
                                 @foreach($vanhoc as $key => $value)

                                    <a href ="{{URL::to('chi-tiet-sach/'.$value->book_id)}}">
                                    <div class="col-sm-4" style="width: 25%; height: 370px;">
                                        <div class="product-image-wrapper" style ="background: #fff;">
                                            <div class="single-products" style ="height: 350px;">
                                                    <div class="productinfo text-center">
                                                        <img src="{{URL::to('/public/upload/book/'.$value->book_image)}}" alt="" height =200 >
                                                        
                                                        <p style ="">{{$value->book_name}}</p>

                                                        <p style ="opacity: 0.7;">{{$value->author}}</p>
                                                        <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;">{{number_format($value->book_price).' '.'đ'}}</h2>
                                                        
                                                    </div>
                                               
                                          
                                            </div>
                                        </div>
                                    </div></a>

                                    @endforeach
                                    <div class="col-sm-12">
                                    <span><a href="{{URL::to('/danh-muc-sach/5')}}" style="float: right; text-transform: none; font-size: 16px; font-weight: 500; margin-top: -5px; margin-right: 20px;">Xem thêm...</a></span></div>
                                    
                            </div>
                            <div class="tab-pane fade" id="kinhte" >
                                       @foreach($kinhte as $key => $value)
                      
                                        <a href ="{{URL::to('chi-tiet-sach/'.$value->book_id)}}">
                                        <div class="col-sm-4" style="width: 25%; height: 370px;">
                                            <div class="product-image-wrapper" style ="background: #fff;">
                                                <div class="single-products" style ="height: 350px;">
                                                        <div class="productinfo text-center">
                                                            <img src="{{URL::to('/public/upload/book/'.$value->book_image)}}" alt="" height =200 >
                                                            
                                                            <p style ="">{{$value->book_name}}</p>
                                                              <p style ="opacity: 0.7;">{{$value->author}}</p>
                                                            <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;">{{number_format($value->book_price).' '.'đ'}}</h2>
                                                            
                                                        </div>
                                            
                                                </div>
                                            </div>
                                        </div></a>

                                        @endforeach
                                        <div class="col-sm-12">
                                             <span><a href="{{URL::to('/danh-muc-sach/11')}}" style="float: right; text-transform: none; font-size: 16px; font-weight: 500; margin-top: -5px; margin-right: 20px;">Xem thêm...</a></span></div>
                                    
                            </div>
                            <div class="tab-pane fade" id="tamly" >
                                       @foreach($tamly as $key => $value)
                      
                                        <a href ="{{URL::to('chi-tiet-sach/'.$value->book_id)}}">
                                        <div class="col-sm-4" style="width: 25%; height: 370px;">
                                            <div class="product-image-wrapper" style ="background: #fff;">
                                                <div class="single-products" style ="height: 350px;">
                                                        <div class="productinfo text-center">
                                                            <img src="{{URL::to('/public/upload/book/'.$value->book_image)}}" alt="" height =200 >
                                                            
                                                            <p style ="">{{$value->book_name}}</p>
                                                              <p style ="opacity: 0.7;">{{$value->author}}</p>
                                                            <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;">{{number_format($value->book_price).' '.'đ'}}</h2>
                                                            
                                                        </div>
                                            
                                                </div>
                                            </div>
                                        </div></a>

                                        @endforeach
                                        <div class="col-sm-12">
                                    <span><a href="{{URL::to('/danh-muc-sach/8')}}" style="float: right; text-transform: none; font-size: 16px; font-weight: 500; margin-top: -5px; margin-right: 20px;">Xem thêm...</a></span></div>
                                    
                            </div> 
                            <div class="tab-pane fade" id="khoahoc" >
                                       @foreach($khoahoc as $key => $value)
                      
                                        <a href ="{{URL::to('chi-tiet-sach/'.$value->book_id)}}">
                                        <div class="col-sm-4" style="width: 25%; height: 370px;">
                                            <div class="product-image-wrapper" style ="background: #fff;">
                                                <div class="single-products" style ="height: 350px;">
                                                        <div class="productinfo text-center">
                                                            <img src="{{URL::to('/public/upload/book/'.$value->book_image)}}" alt="" height =200 >
                                                            
                                                            <p style ="">{{$value->book_name}}</p>
                                                              <p style ="opacity: 0.7;">{{$value->author}}</p>
                                                            <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;">{{number_format($value->book_price).' '.'đ'}}</h2>
                                                            
                                                        </div>
                                            
                                                </div>
                                            </div>
                                        </div></a>

                                        @endforeach
                                        <div class="col-sm-12">
                                         <span><a href="{{URL::to('/danh-muc-sach/6')}}" style="float: right; text-transform: none; font-size: 16px; font-weight: 500; margin-top: -5px; margin-right: 20px;">Xem thêm...</a></span></div>
                                    
                            </div>        
                            </div>
</div></div></div></div></div>



<!-- <div class="col-sm-6" style="padding: 0px;">
<div class="features_items" style="background: #fff; border-radius: 5px; margin-top: 10px; padding-top: 10px;">
   @foreach($author as $key => $auth)
                        <a href ="{{URL::to('chi-tiet-tac-gia/'.$auth->author_id)}}">
                        <div class="col-sm-6" style="width: 50%; height: 300px;">
                            <div class="product-image-wrapper" style="border: none;">
                                <div class="single-products" style ="height: 350px;">
                                </div>
                            </div>
                        </div></a>
                        <div class="col-sm-6">
                             <a href ="{{URL::to('chi-tiet-tac-gia/'.$auth->author_id)}}"  style=""><b style=" font-size: 16px;">Tác giả: {{$auth->author_name}}</b></a>
                             <br>
                             <span style="display: -webkit-box; -webkit-box-orient: vertical;
                             -webkit-line-clamp: 5; overflow: hidden; margin-top: 10px; margin-bottom: 10px;">
                             {{$auth->author_biography}}   
                             </span>
                        </div>
                        <span style=""></span>
                        @endforeach
</div></div>
             -->
 @endsection