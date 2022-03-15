@extends('pages.customer.customer_layout')
@section('customer_content')
 <ol class="breadcrumb" style="margin: 0px;">
                  <li class="active" style=" font-weight: 1000; color: #3a8fce;">SỔ ĐỊA CHỈ</li>  
                  <div style ="float: right; font-weight: 1000; color: #33dd30; margin-top: 20px;">
                                    <?php
                                        $message_g = Session::get('message-g');
                                        if($message_g){
                                            echo $message_g;
                                            Session::put('message-g',null);}
                                    ?>
                                </div>
                                  <div style ="float: right; font-weight: 1000; color: red; margin-top: 20px;">
                                    <?php
                                        $message_b = Session::get('message-b');
                                        if($message_b){
                                            echo $message_b;
                                            Session::put('message-b',null);}
                                    ?>
                                </div>
</ol>

<a href="{{URL::to('/them-dia-chi/'.$customer_id)}}"><div class="container" style="width: 945px;  background: #fff; border-radius: 5px; margin-bottom: 10px; float: left;  padding: 10px; border: 1px dashed #b4b4b4;">
        <span style ="margin-left: 350px;"><i class="fa fa-plus" aria-hidden="true"></i> Thêm địa chỉ giao hàng mới</span></div></a>

@foreach($address as $key =>$value)
<div class="container" style="width: 945px;  background: #fff; border-radius: 5px; margin-bottom: 10px; float: left; padding-top: 10px; padding-bottom: 10px;">
            <div class="breadcrumbs">
               
                        </div>
                                
                                <table class="table table-condensed total-result" style="background: #fff; margin-bottom: 0px;">
                                    <tr>
                                        <td style=" border:0px;" colspan="2">
                                        <span style="text-transform: uppercase;">{{$value->customer_name}}</span>
                                            <span style="color: green; margin-left: 20px;">
                                                <?php 
                                                    if($value->address_default == 1)
                                                        echo "Địa chỉ mặc định";
                                                ?>
                                            </span>
                                            <?php
                                            if($value->address_default == 0){
                                                ?>
                                            
                                            <a href="{{URL::to('/delete-address/'.$value->address_id.'/'.$value->customer_id)}}" style="color: red; float: right;">Xóa</a>
                                            <?php
                                            }
                                            ?>
                                         <a href="{{URL::to('/chinh-sua-dia-chi/'.$value->address_id.'/'.$value->customer_id)}}" style="float: right; margin-right: 20px;"> Chỉnh sửa</a>

                                            
                                    </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 80px; border:0px;">SĐT</td>
                                        <td style=" border:0px;"><span><b>{{$value->customer_phone}}</b></span>

                                    </tr>
                                    <tr class="shipping-cost">
                                        <td style="width: 80px; border:0px;">Địa chỉ</td>
                                        <td style=" border:0px;"><span>{{$value->address_detail}}</span>

                                        </td>

                                    </tr>

                                </table>    
                               

                    </div>
                                 @endforeach   
    @endsection