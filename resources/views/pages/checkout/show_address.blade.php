@extends('pages.customer.customer_layout')
@section('customer_content')
 <ol class="breadcrumb" style="margin: 0px;">
                  <li class="active" style="font-weight: 1000; color: #3a8fce;">CHỌN ĐỊA CHỈ GIAO HÀNG</li>                                 
</ol>
@foreach($address as $key =>$value)
<div class="container" style="width: 945px;  background: #fff; border-radius: 5px; margin-bottom: 10px; float: left; padding-top: 10px;">
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

                                         <a href="{{URL::to('/save-delivery-address/'.$value->address_id.'/'.$value->customer_id)}}" style="float: right; margin-right: 20px;"> Chọn</a>

                                            
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