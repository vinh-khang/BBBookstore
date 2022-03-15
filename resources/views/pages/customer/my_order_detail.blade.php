@extends('pages.customer.customer_layout')
@section('customer_content')

<div class="col-sm-12" style="margin-bottom: 10px;"> 
@foreach($detail_order as $key =>$value)
<span><h4>Chi tiết đơn hàng #{{$value->order_id}} - <b>{{$value->status}}</b></h4></span>  
<span style="float: right; margin-right: 20px;">
  <?php
    $date = $value->order_time;
      ?>
  Ngày đặt hàng: {{$date}}
</span> 
 @endforeach 
</div>
 
                              
<div class="container" style="width: 520px;  background: #fff; border-radius: 5px; float: left; padding-bottom: 20px; height: 200px; margin: 0px 10px 10px 0px;">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px;  background: #fff;">

          <li class="active" style="font-size: 20px; font-weight: 700; color: #00adee;">Địa chỉ người nhận</li>   
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
<div class="container" style="width: 410px;  background: #fff; border-radius: 5px;float: left; padding-bottom: 20px; height: 200px;">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px;  background: #fff;">

          <li class="active" style="font-size: 20px; font-weight: 700; color: #00adee;">Hình thức thanh toán & vận chuyển</li>   
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

 <div class="container" style="width: 940px;  background: #fff; border-radius: 5px; margin-bottom: 10px; float: left; padding-bottom: 10px;">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px; background: #fff;">

          <li style="font-size: 20px; font-weight: 700; color: #00adee;">Sản phẩm</li>   
        </ol>

      </div>
      <div class="table-responsive cart_info" style="border-radius: 5px;">
        <table class="table table-condensed" style = "margin-bottom: 10px;">
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
                  <span style="float: right;">{{number_format($total).' '.'₫'}}</span>
              </td>
            </tr>
            @endforeach
            
          </tbody>
          

                <table class="table table-condensed total-result" style="background: #fff; width: 350px; float: right;">
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
                    <td style="padding:5px !important; border:0px !important;"><b>Thành tiền</b></td>
                    <td style="padding:5px !important; border:0px !important;  float: right; color: red;"><span>
                      <b>{{number_format($value->total_price).' '.'₫'}}</b>
                    </span></td>
                  </tr>
                  @endforeach
                </table>
                <div style="float: left; margin-top: 60px;">
              <?php
                $customer_id = session::get('customer_id');
              ?>
              <a href="{{URL::to('/don-hang-cua-toi/'.$customer_id)}}" class="btn btn-fefault cart add-to-cart" style="width: 280px; border-radius: 5px;" 
                            >Quay lại đơn hàng của tôi</a>
          </div>


        </table>
      
    </div>      
</div>




@endsection