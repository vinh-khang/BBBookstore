@extends('pages.customer.customer_layout')
@section('customer_content')
<div class="features_items" style="background: #fff; border-radius: 5px; margin-bottom: 10px; width: 600px; margin-left: 100px;"> 
<section id="form" style="margin-bottom: 20px; margin-top: 10px;"><!--form-->
        <div class="container">
            <div class="row">   
                <div class="col-sm-4" style="width: 900px;" >
                    <div class="signup-form" style="margin-left: 30px;"><!--sign up form-->
                        <h5 style="margin: 0px; color: #3a8fce; margin-top: 3px; margin-left: 170px;"><b> THÔNG TIN TÀI KHOẢN</b></h5>
                        
                        <form action="{{URL::to('/update-customer')}}" method="POST">
                            {{csrf_field()}}
                            <label style="margin-top: 10px; color: #696763;">Họ tên</label>
                            <input type="text" name="customer_name" placeholder="Nhập họ tên" required="" value="{{$customer_name}}" style=" width: 500px;"/>
                            <label style="color: #696763;">Email</label>
                            <input type="email" name="customer_email" placeholder="Nhập Email" required="" value="{{$customer_email}}" style=" width: 500px;"/>
                            <label style="color: #696763;">Số điện thoại</label>
                            <input value="{{$customer_phone}}" style=" width: 500px;" disabled="disabled" />
                            <input type="hidden" name="customer_phone" required="" value="{{$customer_phone}}" style=""/>
                            <button type="submit" class="" style="margin-top: 20px;">Cập nhật</button>
                        </form>
                    </div>
                     <div style ="float: right; font-weight: 1000; color: #33dd30; margin-top: 20px; margin-right: 340px;">
                                    <?php
                                        $message_g = Session::get('message-g');
                                        if($message_g){
                                            echo $message_g;
                                            Session::put('message-g',null);}
                                    ?>
                                </div>
            </div>
        </div>
    </div>
</section></div>
    
    @endsection