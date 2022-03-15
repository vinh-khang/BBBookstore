@extends('pages.customer.customer_layout')
@section('customer_content')
<div class="features_items" style="background: #fff; border-radius: 5px; margin-bottom: 10px; width: 600px; margin-left: 100px;"> 
<section id="form" style="margin-bottom: 40px; margin-top: 10px;"><!--form-->
        <div class="container">
            <div class="row">   
                <div class="col-sm-4" style="width: 900px;">
                    <div class="signup-form" style="margin-left: 30px;"><!--sign up form-->
                        <h5 class="active" style=" font-weight: 1000; color: #3a8fce; margin: 0px; margin-left: 170px; padding: 5px;">CHỈNH SỬA ĐỊA CHỈ GIAO HÀNG</h5> 
                        @foreach($address as $key => $value)
                        <form action="{{URL::to('/update-address')}}" method="POST">
                            {{csrf_field()}}
                            <label style="margin-top: 10px; color: #696763;">Họ tên</label>
                            <input type="text" name="customer_name" placeholder="Nhập họ tên" required="" value="{{$value->customer_name}}" style=" width: 500px; "/>
                            <label style="color: #696763;">Số điện thoại</label>
                            <input type="text" name="customer_phone" placeholder="Nhập số điện thoại" required="" value="{{$value->customer_phone}}" style=" width: 500px; "/>
                             <label style="color: #696763;">Địa chỉ chi tiết</label>
                            <input type="text" name="address_detail" placeholder="Nhập địa chỉ" required="" value="{{$value->address_detail}}" style=" width: 500px; "/>
                            <label style="color: #696763;">Tỉnh/Thành phố</label><br>
                            <select name = "shipping_id" style="width: 500px;">
                                        <option value="0">Chọn Tỉnh/Thành phố</option>
                                        @foreach($provine as $key => $value2)
                                        @if($value->shipping_id == $value2->shipping_id)
                                        <option selected value="{{$value2->shipping_id}}">{{$value2->shipping_address}}</option>
                                        @else
                                         <option value="{{$value2->shipping_id}}">{{$value2->shipping_address}}</option>
                                         @endif
                                        @endforeach
                            </select><br>
                            <input type="checkbox" name="address_default" value="1" style=" float: left; width: 15px;"/>
                            <label style="color: #696763; padding-top: 12px; margin-left: 10px;" > Đặt làm địa chỉ mặc định</label>
                            
                            <input type="hidden" name="customer_id" value="{{$customer_id}}"/>
                            <input type="hidden" name="address_id" value="{{$address_id}}"/>
                            <button type="submit" style="margin-top: 20px;">Cập nhật</button>
                        </form>
                        @endforeach
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