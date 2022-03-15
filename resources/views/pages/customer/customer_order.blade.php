@extends('pages.customer.customer_layout')
@section('customer_content')
<div class="container" style="width: 945px; float: left; background: #fff; border-radius: 5px; margin-bottom: 10px;">
            <div class="breadcrumbs">
                <ol class="breadcrumb" style="margin: 0px;">

                  <li class="active" style="font-weight: 1000; color: #3a8fce;"> ĐƠN HÀNG CỦA TÔI</li>
                </ol>

            </div>
            <div class="table-responsive cart_info" style="border-radius: 5px;">
                <table class="table table-condensed" style = "">
                        <tr class="cart_menu" style="height: 10px;">
                            <td style="width: 80px;">Mã đơn</td>
                            <td class="description" style="width: 110px;">Ngày mua</td>
                            <td class="description">Sản phẩm</td>
                            <td class="total" style="width: 130px;">Tổng tiền</td>
                            <td class="price" style="width: 200px;">Trạng thái</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $key =>$value)
                        <tr  style="border-top: 1px solid #ececec;">
                            <td><a href = "{{URL::to('/chi-tiet-don-hang/'.$value->order_id.'/'.$value->customer_id)}}">
                                 {{$value->order_id}}
                                </a>
                            </td>
                              <td>
                                <?php
                                    $new_time = explode(" ",$value->order_time);
                                    $get_date = $new_time[1];
                                ?>
                                 {{$get_date}}
                            </td>
                            <td style="width: 500px;">
                            @foreach($order_item as $key => $value2)
                            <?php
                                $id = $value->order_id;
                                $order_id = $value2->order_id;
                                if($id == $order_id){
                            ?>
                             {{$value2->book_name}}<br>
                             <?php
                             }
                             ?>
                             @endforeach
                            </td>
                            <td class="cart_name">
                                {{number_format($value->total_price).' '.'₫'}}
                            </td>
                            
                            <td class="cart_price">
                                {{$value->status}}
                                
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                        
                </table>
            
        </div>          
</div>
    
    @endsection