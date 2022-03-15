@extends('layout')
@section('content')
    
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
                                <li><a href="{{URL::to('/trang-chu/')}}">Trang chủ</a></li>
                                <li><a href="{{URL::to('/gioi-thieu/')}}">Giới thiệu</a></li>
                                <li class="dropdown"><a href="{{URL::to('/tu-sach/')}}">Tủ sách<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($category as $key => $cate)
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/danh-muc-sach/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li> 
                                <li><a href="{{URL::to('/tac-gia/')}}">Tác giả</a></li>
                         
                                <li class="dropdown"><a href="{{URL::to('/tin-moi/')}}" class="active">Tin mới<i class="fa fa-angle-down"></i></a>
                                 <ul role="menu" class="sub-menu">
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/tin-tuc/')}}">Tin tức</a></li> 
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/diem-sach/')}}">Review sách</a></li>
                                        
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/thong-bao/')}}">Thông báo</a></li> 
                                       
                                    </ul></li> 
                             
                                <li><a href="{{URL::to('/dieu-khoan-su-dung/')}}"  >Hỗ trợ<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/dieu-khoan-su-dung/')}}">Điều khoản sử dụng</a></li> 
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/chinh-sach-doi-tra/')}}">Chính sách đổi - trả - hoàn tiền</a></li>
                                        
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/chinh-sach-bao-mat/')}}">Chính sách bảo mật</a></li> 
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/qui-dinh-giao-hang/')}}">Qui định giao hàng</a></li> 
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/cau-hoi-thuong-gap/')}}">Các câu hỏi thường gặp</a></li> 
                                    </ul></li>
                               
                            </ul>
                        </div>
                         <div style ="float: right; font-weight: 1000; color: #33dd30; float: right;">
                                    <?php
                                        $message_g = Session::get('message-g');
                                        if($message_g){
                                    ?><span>
                                        <i class="fa fa-check-circle" aria-hidden="true" style="font-size: 16px;"></i>
                                    </span>
                                    <?php
                                            echo $message_g;
                                            Session::put('message-g',null);}
                                    ?>
                                   
                                </div>
                                 <div style ="float: right; font-weight: 1000; color: red; float: right;">
                                    <?php
                                        $message_b = Session::get('message-b');
                                        if($message_b){
                                            echo $message_b;
                                            Session::put('message-b',null);}
                                    ?>
                                   
                                </div>
                    </div>
               
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
    <div class="container">
            <div class="row">

                <div class="col-sm-3">
                    <div class="left-sidebar" style="">                     

                          <div class="panel-group category-products" id="accordian" style="background: #fff; border-radius: 5px; "><!--brands_products-->
                            <h2 style ="margin:0px; text-align: center;">TIN TỨC KHÁC</h2>
                            <div class="brands-name" style="padding-top: 0px;">
                                <ul class="nav nav-pills nav-stacked">
                                    <div class="panel panel-default" style="background: #fff;">
                                            @foreach($related as $key => $value)
                                            <h5 style="margin-left:0px; border-bottom: 1px solid #e8e8e8; padding: 10px 10px 10px 10px; text-transform: none;" class="panel-title" style=""><a style ="background: none; margin: 0px; " href="{{URL::to('/xem-tin/'.$value->news_id)}}">{{$value->news_title}}</a></h5>
                                            @endforeach

          
                                    </div>
                          
                                </ul>
                            </div>
                        </div>
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right" style="background: #fff; border-radius: 5px; margin-bottom: 10px; box-shadow: 0px 0px 2px #cbcbcb;">
                    
                   <section>
        
                     @foreach($news as $key => $value)
                    <div class="blog-post-area" style ="margin-top: 10px; padding: 10px 10px 20px 10px;">
                        <h2 class="title text-center" style="color: #428bca; margin-bottom: 10px; ">{{$value->news_title}}</h2>
                        <div class="post-meta" style="margin-bottom: 10px;">
                                <ul>
                                    <li><i class="fa fa-user" style="background: #00adee;"></i>Theo {{$value->news_auth}}</li>
                                    <li><i class="fa fa-clock-o" style="background: #00adee;"></i> {{$value->news_date}}</li>
                                </ul>
                            </div>  
                        <b>{!!$value->news_desc!!}</b>
                        <img src="{{asset('public/upload/news/'.$value->news_image)}}" style="margin: 10px auto 10px auto; height: 350px; display: block;">
                            {!!$value->news_content!!}                       
                        @endforeach
                       </div>                  
                    
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </section>
    
   @endsection