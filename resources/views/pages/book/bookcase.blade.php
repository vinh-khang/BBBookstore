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
                                <li class="dropdown"><a href="{{URL::to('/tu-sach/')}}" class="active">Tủ sách<i class="fa fa-angle-down"></i></a>
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
    
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-3">
                    <div class="left-sidebar" style="">
                        

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
                    
                        <div class="panel-group category-products" id="accordian" style="background: #fff; border-radius: 5px;"><!--brands_products-->
                            <h2 style ="margin:0px;">NHÀ PHÁT HÀNH</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                     @foreach($publisher as $key => $pub)
                                    <div class="panel panel-default" style="background: #fff;">
                                        <div class="panel-heading" style="background: #fff;">
                                            <h4 class="panel-title"><a href="{{URL::to('/nha-phat-hanh/'.$pub->publisher_id)}}">{{$pub->publisher_name}}</a></h4>
                                </div>
                            </div>
                                    @endforeach                                
                                    </ul>
                            </div>
                        </div>

                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    
                    @yield('case_content')
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </section>
    
    @endsection