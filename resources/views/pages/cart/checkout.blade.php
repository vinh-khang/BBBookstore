@extends('pages.customer.customer_layout')
@section('customer_content')

<form action="{{URL::to('/add-order')}}" method="POST">
	{{csrf_field()}}
<div class="container" style="width: 945px;  background: #fff; border-radius: 5px; margin-bottom: 10px; float: left; padding-bottom: 10px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px;">

				  <li class="active" style="font-size: 20px; font-weight: 1000; color: #3a8fce;">1. Địa chỉ giao hàng</li>	 
				</ol>
						</div>
								@foreach($address as $key =>$value2)
								<table class="table table-condensed total-result" style="background: #fff; margin-bottom: 0px;">
									<tr>
										<td style="width: 100px; border:0px;">Họ tên</td>
										<td style=" border:0px;">
										<span><b>{{$value2->customer_name}}</b></span>
									</td>
									</tr>
									<tr>
										<td style="border:0px;">SĐT</td>
										<td style=" border:0px;"><span><b>{{$value2->customer_phone}}</b></span></td>
									</tr>
									<tr class="shipping-cost">
										<td style="border:0px;">Địa chỉ</td>
										<td style=" border:0px;"><span>{{$value2->address_detail}}</span>

										</td>

									</tr>

									<input type="hidden" name="address_id" value="{{$value2->address_id}}">
								</table>	
								
								@endforeach
					</div>

<div class="container" style="width: 945px; float: left; background: #fff; border-radius: 5px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px;">

				  <li class="active" style="font-size: 20px; font-weight: 1000; color: #3a8fce;">2. Sản phẩm</li>
				   <div style ="float: right; font-weight: 1000; color: #33dd30;">
                                    <?php
                                        $message = Session::get('message-g');
                                        if($message){
                                            echo $message;
                                            Session::put('message-g',null);}
                                    ?>
                                </div>
                   
				</ol>

			</div>
			<div class="table-responsive cart_info" style="border-radius: 5px;">
				<table class="table table-condensed" style = "  margin-bottom: 0px;">
						<tr class="cart_menu" style="height: 10px;">
							<td>Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
						</tr>
					</thead>
					<tbody>
						@foreach($mycart as $key =>$value)
						<tr style="border-top: 0.5px solid #ececec;">
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
								{{$value->quantity}}
								
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
										$total = $value->book_price * $value->quantity;
									?>
									<h5><span>{{number_format($total).' '.'₫'}}</span></h5>
								</p>
							</td>
						</tr>
						@endforeach
						
					</tbody>
						
				</table>
			
		</div>			
</div>

<div class="container" style="width: 350px; background: #fff; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; float: right;">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px;">

				  <li class="active" style="font-size: 20px; font-weight: 1000; color: #3a8fce;">Thành tiền</li>
				</ol>
						</div>
								<table class="table table-condensed total-result" style="background: #fff; width: 400px;">
									<tr>
										<td style=" border:0px;">Tổng cộng</td>
										<td style=" border:0px; float: right;">
										<?php
											$total_price = 0 ;
											foreach($mycart as $key =>$value){
											$total_price = $total_price + $value->book_price * $value->quantity;}
										?>
										<span><b>{{number_format($total_price).' '.'₫'}}</b></span>
										<input type="hidden" name="first_price" value="{{$total_price}}" style="margin-left: 15px;"/></td>
									</td>
									</tr>

									<tr class="shipping-cost">
										<td style=" border:0px;">Phí ship</td>
										@foreach($address as $key =>$value)
										<td style=" border:0px; float: right;">{{number_format($value->shipping_price).' '.'₫'}}</td>
										<?php
											$shipping_price = $value->shipping_price;
										?>
										@endforeach										
									</tr>
									<tr>
										<td style=" border:0px;">Thành tiền</td>
										<td style=" border:0px; float: right; color: red;"><span><b>
											<?php
												$price = $total_price + $shipping_price;
											?>
											{{number_format($price).' '.'₫'}}</b>
										</span>
									<input type="hidden" name="total_price" value="{{$price}}" style="margin-left: 15px;"/></td>
									</tr>
								</table>
								<?php 
									$customer_id = Session::get('customer_id');
									?>

									<input type="hidden" name="customer_id" value="{{$customer_id}}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}" />
									<button type="submit" class="btn btn-fefault cart add-to-cart" name="add_to_cart" style="width: 280px; border-radius: 5px;" 
									><b>XÁC NHẬN ĐẶT MUA</b></button>
					</div>


<div class="container" style="width: 580px;  background: #fff; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; float: left;">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px;">
				  <li class="active" style="font-size: 20px; font-weight: 1000; color: #3a8fce;">3. Phương thức thanh toán</li>
				  <div style ="float: right; font-weight: 500; color: #ff5050; margin-right: 0px;">
                                    <?php
                                        $message_b = Session::get('message-b');
                                        if($message_b){
                                            echo $message_b;
                                            Session::put('message-b',null);}
                                    ?>
                                	</div>
				</ol>
						</div>

						<table class="table table-condensed total-result" style="background: #fff;">
									<tr>

									<input type="radio" name="payment" value="1"  style="margin-left: 15px;" checked=""/>
									<span> Thanh toán tiền mặt khi nhận hàng</span><br><br>
									</tr>
									<input type="radio" name="payment" value="2" style="margin-left: 15px;"/>
									<span> Thanh toán bằng thẻ ATM nội địa</span>
									<a href="#themthe" data-toggle="tab" style="float: right; margin-right: 20px;">Thêm thẻ</a>	
																
									

				                        <div class="tab-content">
				                            <div class="tab-pane fade" id="themthe" >
												
												<div style="padding: 0px 20px 0px 20px;">
													<br>

													<span><b>Nhập thông tin thẻ</span></b><a href="#tatthe" data-toggle="tab" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a><br>

													<label style="margin-top: 10px; color: #696763;">Ngân hàng</label><br>
													 <select name="card_bank" style="float: left; margin-right: 20px; padding: 5px; border-radius: 5px; border-color: #00adee;">
											              <option value="1" selected>Vietcombank</option>
											              <option value="2">Vietinbank</option>
											              <option value="3">Agribank</option>
											              <option value="4">Á Châu (ACB)</option>
											              <option value="5">Sacombank</option>
											              <option value="6">Eximbank</option>
											              <option value="7">OCB</option>
											              <option value="8">VPBank</option>
											          </select> 
											        <label style="margin-top: 10px; color: #696763;">Số thẻ</label><br>  
						                            <input type="text" name="card_number" placeholder="Nhập số thẻ" pattern="[0-9]{12}" value="" style=" width: 400px; border-radius: 5px; border-color: #eeeeee;"/><br>  
						                            <label style="margin-top: 10px; color: #696763;">Tên in trên thẻ</label><br>  
						                            <input type="text" name="card_name" placeholder="Nhập tên in trên thẻ"  pattern="[A-Z ]+" style=" width: 400px; border-radius: 5px; border-color: #eeeeee;"/><br>  
						                            <label style="margin-top: 10px; color: #696763;">Ngày phát hành</label><br>  
						                            <input type="text" name="card_date" placeholder="mm/yy" pattern="([0-2]\d|3[0-1])/(0[1-9]|1[0-2])" value="" style=" width: 400px; border-radius: 5px; border-color: #eeeeee;"/>
						                            
					                        	</div>

				                            </div> 
				                            <div class="tab-pane fade" id="tatthe" >
				                            </div>                          	
				                        </div>	
				                   <br>
				                   </table>
                        </div>
                    </div>

									
</form>								
@endsection
