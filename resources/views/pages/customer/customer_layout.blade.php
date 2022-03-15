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
                         <div style ="float: right; font-weight: 1000; color: #33dd30; float: right;">
                                    <?php
                                        $message = Session::get('message');
                                        if($message){
                                    ?><span>
                                        <i class="fa fa-check-circle" aria-hidden="true" style="font-size: 16px;"></i>
                                    </span>
                                    <?php
                                            echo $message;
                                    ?> 
                                    <?php
                                            Session::put('message',null);}
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
                    <div class="left-sidebar" style="margin-top: 0px; ">
                        
                        

                          <div class="panel-group category-products" id="accordian" style="background: #fff; border-radius: 5px; padding-bottom: 0px; "><!--brands_products-->
                            <h2 style ="margin-bottom:0px; text-align: center; ">TÀI KHOẢN CỦA TÔI</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <span style="margin-left: 20px;">Xin chào,</span><br>
                                    <div style="margin-left: 20px;"><b>
                                    <?php
                                    $name = Session::get('customer_name');
                                    $customer_id = Session::get('customer_id');
                                    echo $name;
                                    ?>
                                    </div></b>
                                    <div class="panel panel-default" style="background: #fff; padding-bottom: 20px; ">
                                        <div class="panel-heading" style="background: #fff;  padding: 0px;">
                                            <li>
                                            <h4 style="margin-left:0px; margin-top: 10px;" class="panel-title" ><a href="{{URL::to('/gio-hang/'.$customer_id)}}"><i class="fa fa-shopping-cart" aria-hidden="true" style="margin-right: 17px; padding: 3px;"></i> Giỏ hàng</a></h4>
                                            </li>
                                            <li>
                                            <h4 style="margin-top:10px; padding: 3px;" class="panel-title"><a href="{{URL::to('/thong-tin-tai-khoan/'.$customer_id)}}"><i class="fa fa-user" aria-hidden="true" style="margin-right: 20px;"></i> Thông tin tài khoản</a></h4>
                                            </li>
                                          <!--   <li>
                                            <h4 style="margin-top:10px; padding: 3px;" class="panel-title"><a href="{{URL::to('/danh-muc-sach/')}}"><i class="fa fa-bell" aria-hidden="true" style="margin-right: 18px;"></i> Thông báo của tôi</a></h4>
                                            </li> -->
                                            <li>
                                            <h4 style="margin-top:10px; padding: 3px;" class="panel-title"><a href="{{URL::to('/don-hang-cua-toi/'.$customer_id)}}"><i class="fa fa-window-maximize" aria-hidden="true" style="margin-right: 18px;"></i> Quản lý đơn hàng</a></h4>
                                            </li>
                                            <li>
                                            <h4 style="margin-top:10px; padding: 3px;" class="panel-title"><a href="{{URL::to('/so-dia-chi/'.$customer_id)}}"><i class="fa fa-map-marker" aria-hidden="true" style="margin-right: 25px;"></i> Sổ địa chỉ</a></h4>
                                            </li>
                                         <!--    <li>
                                            <h4 style="margin-top:10px; padding: 3px;" class="panel-title"><a href="{{URL::to('/danh-muc-sach/')}}"><i class="fa fa-credit-card-alt" aria-hidden="true" style="margin-right: 15px;"></i> Thông tin thanh toán</a></h4>
                                            </li> -->
                                </div>
                            </div>                           
                                    </ul>
                            </div>
                        </div>

                        <!-- Sách bán chạy -->


                            <!-- Hết -->

                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    
                    @yield('customer_content')
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </section>
    
    @endsection