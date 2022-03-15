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
                                <li><a href="{{URL::to('/gioi-thieu/')}}">Giới thiệu</a></li>
                                <li class="dropdown"><a href="{{URL::to('/tu-sach/')}}" >Tủ sách<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($category as $key => $cate)
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/danh-muc-sach/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li> 
                                <li><a href="{{URL::to('/tac-gia/')}}">Tác giả</a></li>
                         
                                <li class="dropdown"><a href="{{URL::to('/tin-moi/')}}"  class="active">Tin mới<i class="fa fa-angle-down"></i></a>
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
            @foreach($news_type as $key => $type)
            <h2 class="title text-center" style =" padding-bottom: 5px; color: #666; text-align: left; border-bottom: 4px solid #00adee;"><i class="fa fa-newspaper-o" aria-hidden="true" style ="color: #00adee;margin-right: 10px;"></i>
            <?php
                if($type->news_type == 1) echo "TIN TỨC";
                elseif($type->news_type == 2) echo "REVIEW SÁCH";
                elseif($type->news_type == 3) echo "THÔNG BÁO";
                else echo "TẤT CẢ BÀI VIẾT";
            ?>    
            </h2>
            @endforeach
            <div class="row">
                 @foreach($news as $key => $value)
                 <a href="{{URL::to('/xem-tin/'.$value->news_id)}}">
                <div class="col-sm-3" style="background: #fff; border-radius: 5px; margin: 0px 10px 20px 10px; box-shadow: 0px 0px 2px #cbcbcb; width: 300px;">
                    
                    <div class="blog-post-area" style ="padding-top: 10px; height: 340px;">
                       <div style="">
                        <div style="color: #fff; position: absolute; top: 10px; z-index: 1; background: #00adee; padding: 0px 3px 0px 3px; opacity: 0.7;">
                            <?php
                            if($value->news_type == 1) echo "TIN TỨC";
                            if($value->news_type == 2) echo "REVIEW SÁCH";
                            if($value->news_type == 3) echo "THÔNG BÁO";
                            ?>
                           </div>
                        <div  style="position: relative;
                                padding-top: 50%;
                                background: #E9EEF1;
                                overflow: hidden;width: 100%;
                                margin: 0 0 10px;
                                max-width: none;
                                float: none;
                                ">
                            <div class="image" style="position: absolute;
                                left: 0;
                                top: 0;
                                width: 100%;
                                height: 100%;">
                            <img src="{{asset('public/upload/news/'.$value->news_image)}}" style ="position: absolute;
                                width: 270px;
                                left: 50%;
                                top: 50%;
                                -webkit-transform: translate3d(-50%,-50%,0);
                                -moz-transform: translate3d(-50%,-50%,0);
                                -ms-transform: translate3d(-50%,-50%,0);
                                -o-transform: translate3d(-50%,-50%,0);
                                transform: translate3d(-50%,-50%,0);">
                        </div>
                        </div>  
                        <div style=" overflow: hidden; display: -webkit-box;-webkit-box-orient: vertical;    -webkit-line-clamp: 8;overflow: hidden; position: relative; color: #000;">
                         <h5 class="title text-left" style="color: #428bca; margin: 0px 0px 0px 0px;">{{$value->news_title}}</h5> 
                         
                        <h5 class="title text-left" style="color: #666; margin: 5px 0px 5px 0px; opacity: 0.7;">Cập nhật ngày: {{$value->news_date}}</h5> 
                            
                            {{$value->news_desc}}
                        </div>

                     
                       </div> 
                       </div>                 
                    
                </div>
                    </a>
                   @endforeach
            </div>
            {{$news->links()}}
        </div>

    </section>
    
   @endsection