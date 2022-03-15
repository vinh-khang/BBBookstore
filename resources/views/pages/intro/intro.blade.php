@extends('layout')
@section('content')
    
         <div class="header-bottom" style =""><!--header-bottom-->
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="navbar-header">
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trang-chu/')}}">Trang chủ</a></li>
                                <li><a href="{{URL::to('/gioi-thieu/')}}" class="active">Giới thiệu</a></li>
                                <li class="dropdown"><a href="{{URL::to('/tu-sach/')}}" >Tủ sách<i class="fa fa-angle-down"></i></a>
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
          
                    </div>
               
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
    <section>
        <div class="container">
            <div class="row">
                
                <div class="col-sm-12" style="background: #fff; border-radius: 5px; margin-bottom: 10px; box-shadow: 0px 0px 2px #cbcbcb; padding-bottom: 20px;">
                     @foreach($intro as $key => $value)
                    <div class="blog-post-area" style ="margin-top: 10px; padding: 10px;">
                        <h2 class="title text-center" style="color: #428bca; margin-bottom: 10px;">{{$value->news_title}}</h2>
                        <div class ="col-sm-12" style="padding: 0px;">
                            <img src="{{asset('public/frontend/images/cuahang/gioithieu.jpg')}}" style ="width: 1200px; padding-bottom: 10px;">
                        </div>   
                       
                            {!!$value->news_content!!}                       
                        @endforeach
                       </div>                  
                    
                </div>
            </div>
        </div>
    </section>
    
   @endsection