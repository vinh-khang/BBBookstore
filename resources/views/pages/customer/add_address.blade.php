@extends('pages.customer.customer_layout')
@section('customer_content')
<div class="features_items" style="background: #fff; border-radius: 5px; margin-bottom: 10px; width: 600px; margin-left: 100px;"> 
<section id="form" style="margin-bottom: 40px; margin-top: 10px;"><!--form-->
        <div class="container">
            <div class="row">   
                <div class="col-sm-4" style="width: 900px;">
                    <div class="signup-form" style="margin-left: 30px;"><!--sign up form-->
                        <h5 class="active" style=" font-weight: 1000; color: #3a8fce; margin: 0px; margin-left: 170px; padding: 5px;">THÊM ĐỊA CHỈ GIAO HÀNG MỚI</h5>  
                        <form action="{{URL::to('/save-address')}}" method="POST">
                            {{csrf_field()}}
                            <label style="margin-top: 10px; color: #696763;">Họ tên</label>
                            <input type="text" name="customer_name" placeholder="Nhập họ tên" required="" value="" style=" width: 500px; border-radius: 5px;"/>
                            <label style="color: #696763;">Số điện thoại</label>
                            <input type="text" name="customer_phone" placeholder="Nhập số điện thoại" required="" value="" style=" width: 500px; border-radius: 5px;"/>
                             <label style="color: #696763;">Địa chỉ chi tiết</label>
                            <input type="text" name="address_detail" placeholder="Nhập địa chỉ" required="" value="" style=" width: 500px; border-radius: 5px;"/>
                            <label style="color: #696763;">Tỉnh/Thành phố</label><br>
                            <select name = "shipping_id" style="width: 500px;">
                                        <option value="0">Chọn Tỉnh/Thành phố</option>
                                        @foreach($provine as $key => $value)
                                        <option value="{{$value->shipping_id}}">{{$value->shipping_address}}</option>
                                        @endforeach
                            </select>
                            <input type="hidden" name="customer_id" value="{{$customer_id}}" style=" width: 500px; border-radius: 5px;"/>
                            <button type="submit" style="margin-top: 20px;">Thêm</button>
                        </form>
                    </div>
                     <div style ="float: left; font-weight: 1000; color: red; margin-top: 20px;">
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
</section></div>
    
    @endsection