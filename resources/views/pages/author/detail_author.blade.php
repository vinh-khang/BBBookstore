@extends('layout')
@section('content')
<div class="header-bottom" style =""><!--header-bottom-->
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                   
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
                                <li><a href="{{URL::to('/tac-gia/')}}" class="active">Tác giả</a></li>
                         
                                <li class="dropdown"><a href="{{URL::to('/tin-moi/')}}">Tin mới<i class="fa fa-angle-down"></i></a>
                                 <ul role="menu" class="sub-menu">
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/tin-tuc/')}}">Tin tức</a></li> 
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/diem-sach/')}}">Review sách</a></li>
                                        
                                        <li><a style ="background: none; margin: 0px;" href="{{URL::to('/thong-bao/')}}">Thông báo</a></li> 
                                       
                                    </ul></li> 
                             
                                <li><a href="{{URL::to('/ho-tro/')}}">Hỗ trợ<i class="fa fa-angle-down"></i></a>
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
                <div class="col-sm-12" style="background: #fff;  border-radius: 5px;  box-shadow: 0px 0px 2px #cbcbcb; margin-bottom: 10px;">
                    @foreach($detail_author as $key => $value)
						<div class="product-details"><!--product-details-->
												<div class="col-sm-3" style="">
													<div class="view-product">
														<img src="{{URL::to('/public/upload/author/'.$value->author_image)}}" alt="" style ="width: 280px; height: 280px; padding: 10px; background: #fff; border-radius: 5px; ">
													</div>
							
												</div>
												<div class="col-sm-9" style="background: #fff; margin-bottom: 10px;">
													<div class="author-information" style="margin-left: 20px; background: #fff; padding: 10px;"><!--/product-information-->
														<img src="images/product-details/new.jpg" class="newarrival" alt="" />
														<h3 style="text-transform: uppercase; color: #666; margin-top: 10px;"><b>{{$value->author_name}}</b></h3>
														
														<p>{!!$value->author_biography!!}</p>
													
													
												

											
						 
							
								<h4><b>MỘT SỐ TÁC PHẨM CỦA TÁC GIẢ</b></h4>
						@endforeach  
						@foreach($author_book as $key => $aa)
								<div class="col-sm-6" style="">			
								<h4 style="margin: 5px 0px 5px 0px;"><a href="{{URL::to('chi-tiet-sach/'.$aa->book_id)}}" style="color: #000; font-weight: 400;"><p style ="margin-top: 5px;"><i class="fa fa-newspaper-o" aria-hidden="true"></i><b> </b>{{$aa->book_name}}</p></a></h4>
								</div>
												
						@endforeach 
						                    
                    		</div><!--/product-information-->
                    </div>
												
				</div>
                    
                </div>
            </div>
        </div>
    </section>
    


@endsection