@extends('admin_layout')
@section('admin_content')

<div class="col-sm-12" style="margin-bottom: 10px;"> 
@foreach($detail_order as $key =>$value)
<span><h4>Chi tiết đơn hàng #{{$value->order_id}} - <b>{{$value->status}}</b></h4><a href="{{URL::to('/print-order/'.$value->order_id)}}" style="float: right;  margin-right: 20px;" target="_blank">
               <i class="fa fa-print" aria-hidden="true"></i></a></span>
  
<span style="float: right; margin-right: 20px;">
  <?php
    $date = $value->order_time;
      ?>
  Ngày đặt hàng: {{$date}}
</span>  
</div>
<div class="col-sm-12">     
<div class="container" style="width: 300px;  background: #fff; border-radius: 5px; margin-bottom: 10px; float: left; padding-bottom: 20px; height: 200px;">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px; background: #fff;">

          <li style="font-size: 20px; font-weight: 700; color: #00adee;">1. Thông tin khách hàng</li>   
        </ol>
            </div>
                
                <table class="table table-condensed total-result" style="background: #fff; margin-bottom: 0px; color: #fff !important;">
                  <tr>
                    <td style="padding:5px !important; border:0px !important; width: 60px;">Họ tên</td>
                    <td style="padding:5px !important; border:0px !important;">
                    <span><b>{{$value->customer_name}}</b></span>
                  </td>
                  </tr>
                  <tr>
                    <td style="padding:5px !important; border:0px !important;">SĐT</td>
                    <td style="padding:5px !important; border:0px !important;"><span>{{$value->customer_phone}}</span></td>
                  </tr>
                  <tr class="shipping-cost">
                    <td style="padding: 5px !important; border:0px !important;">Email</td>
                    <td style="padding: 5px !important; border:0px !important;"><span>{{$value->customer_email}}</span>

                    </td>

                  </tr>

                </table>  
                
                @endforeach
          </div>

<div class="container" style="width: 490px;  background: #fff; border-radius: 5px; margin-left: 10px; float: left; padding-bottom: 20px; height: 200px;">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px;  background: #fff;">

          <li class="active" style="font-size: 20px; font-weight: 700; color: #00adee;">2. Địa chỉ người nhận</li>   
        </ol>
            </div>
                @foreach($detail_order as $key =>$value)
                <table class="table table-condensed total-result" style="background: #fff; margin-bottom: 0px;">
                  <tr>
                    <td style="padding:5px !important; border:0px !important; width: 60px;">Họ tên</td>
                    <td style="padding:5px !important; border:0px !important;">
                    <span><b>{{$value->order_name}}</b></span>
                  </td>
                  </tr>
                  <tr>
                    <td style="padding:5px !important; border:0px !important;">SĐT</td>
                    <td style="padding:5px !important; border:0px !important;"><span>{{$value->order_phone}}</span></td>
                  </tr>
                  <tr class="shipping-cost">
                    <td style="padding:5px !important; border:0px !important;">Địa chỉ</td>
                    <td style="padding:5px !important; border:0px !important;"><span>{{$value->order_address}}</span>

                    </td>

                  </tr>

                </table>  
                
                @endforeach
          </div>
<div class="container" style="width: 405px;  background: #fff; border-radius: 5px; margin-left: 10px; float: left; padding-bottom: 20px; height: 200px;">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px;  background: #fff;">

          <li class="active" style="font-size: 20px; font-weight: 700; color: #00adee;">3. Hình thức thanh toán & vận chuyển</li>   
        </ol>
            </div>
                @foreach($detail_order as $key =>$value)
                <table class="table table-condensed total-result" style="background: #fff; margin-bottom: 0px;">
                   <tr class="shipping-cost">
                    <td style="padding:5px !important; border:0px !important; ">Giao đến</td>
                    <td style="padding:5px !important; border:0px !important;"><span>{{$value->shipping_address}}</span>
                    </td>
                  </tr>
                  <tr class="shipping-cost">
                    <td style="padding:5px !important; border:0px !important;">Phí ship</td>
                    <td style="padding:5px !important; border:0px !important;"><span>{{number_format($value->shipping_price)}}</span>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding:5px !important; border:0px !important;">Thanh toán</td>
                    <td style="padding:5px !important; border:0px !important;"><span>{{$value->payment_name}}</span></td>
                  </tr>
                </table>  
                
                @endforeach
          </div>
</div>

<div class="col-sm-12">   
 <div class="container" style="width: 910px;  background: #fff; border-radius: 5px; margin-bottom: 10px; float: left; padding-bottom: 10px;">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px; background: #fff;">

          <li style="font-size: 20px; font-weight: 700; color: #00adee;">4. Sản phẩm</li>   
        </ol>

      </div>
      <div class="table-responsive cart_info" style="border-radius: 5px;">
        <table class="table table-condensed" style = "">
            <tr class="cart_menu" style="height: 10px;">
              <td style="width: 100px;">Hình ảnh</td>
              <td style="width: 400px;">Tên sản phẩm</td>
              <td class="price">Giá</td>
              <td class="quantity">Số lượng</td>
              <td class="total">Tổng tiền</td>
            </tr>
          </thead>
          <tbody>
            @foreach($detail_order_item as $key =>$value)
            <tr style="border-top: 1px solid #ececec;">
              <td  style = " padding-bottom: 20px;">
                <img src="{{URL::to('/public/upload/book/'.$value->book_image)}}" alt="" style ="height: 90px; width: 70px">
              </td>
              <td class="cart_name">
                {{$value->book_name}}
              </td>
              <td class="cart_price">
                {{number_format($value->book_price).' '.'₫'}}
                
              </td>
              <td class="cart_quantity">
                {{$value->item_qty}}
                
              </td>
              <td class="cart_total">
                  <?php
                    $total = $value->book_price * $value->item_qty;
                  ?>
                  <span>{{number_format($total).' '.'₫'}}</span>
              </td>
            </tr>
            @endforeach
            
          </tbody>
            
        </table>
      
    </div>      
</div>

<div class="container" style="width: 295px; background: #fff; border-radius: 5px;margin-bottom: 10px; float: left; margin-left: 10px;">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px;   background: #fff;">

          <li class="active" style="font-size: 20px; font-weight: 700; color: #00adee;">5. Thành tiền</li>
        </ol>
            </div>
                <table class="table table-condensed total-result" style="background: #fff; width: 400px;">
                  <tr>
                    <td style="padding:5px !important; border:0px !important;">Tổng cộng</td>
                    <td style="padding:5px !important; border:0px !important; float: right">
                    <?php
                      $price= 0 ;
                      foreach($detail_order_item as $key =>$value){
                      $price = $price + $value->book_price * $value->item_qty;}
                    ?>
                    <span>{{number_format($price).' '.'₫'}}</span>                    
                  </td>
                  </tr>
                  @foreach($detail_order as $key =>$value)
                  <tr class="shipping-cost">
                    <td style="padding:5px !important; border:0px !important;">Phí ship</td>
                    <td style="padding:5px !important; border:0px !important;  float: right">{{number_format($value->shipping_price).' '.'₫'}}</td>                  
                  </tr>
                  <tr>
                    <td style="padding:5px !important; border:0px !important;">Thành tiền</td>
                    <td style="padding:5px !important; border:0px !important;  float: right; color: red;"><span>
                      <b>{{number_format($value->total_price).' '.'₫'}}</b>
                    </span></td>
                  </tr>
                  @endforeach

                </table>
             

          </div>

         
             <?php
                  if($value->order_status == 1){
                ?>
                  <a type="submit" href = "{{URL::to('/accept-order/'.$value->order_id)}}" class="btn btn-info" name="add_to_cart" style="width: 295px; border-radius: 5px; margin-left: 10px; background: #ff6a6a; border: 0px;" 
                  >XÁC NHẬN</a>
                <?php
                }
                ?>

                 <?php
                  if($value->order_status == 2){
                ?>
                  <a type="submit" href = "{{URL::to('/being-transported/'.$value->order_id)}}" class="btn btn-info" name="add_to_cart" style="width: 295px; border-radius: 5px; margin-left: 10px; background: #00adee; border: 0px;" 
                  >ĐANG VẬN CHUYỂN</a>
                <?php
                }
                ?>

                 <?php
                  if($value->order_status == 3){
                ?>
                  <a type="submit" href = "{{URL::to('/successful-delivery/'.$value->order_id)}}" class="btn btn-info" name="add_to_cart" style="width: 295px; border-radius: 5px; margin-left: 10px;  background: #35c367; border: 0px;" 
                  >GIAO HÀNG THÀNH CÔNG</a>
                <?php
                }
                ?>
                

</div>

@endsection