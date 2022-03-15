@extends('pages.customer.customer_layout')
@section('customer_content')

<section id="cart_items">
		<div class="container" style="width: 945px; float: left; background: #fff; border-radius: 5px;  padding-bottom: 10px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px;">

				  <li class="active" style="font-weight: 1000; color: #3a8fce;">GIỎ HÀNG </li>
				   <div style ="float: right; font-weight: 1000; color: #33dd30;">
                                    <?php
                                        $message = Session::get('message-g');
                                        if($message){
                                            echo $message;
                                            Session::put('message-g',null);}
                                    ?>
                                </div>
                    <div style ="float: right; font-weight: 1000; color: #ff5050;">
                                    <?php
                                        $message = Session::get('message-b');
                                        if($message){
                                            echo $message;
                                            Session::put('message-b',null);}
                                    ?>
                                </div>
				</ol>
			</div>
			<div class="table-responsive cart_info" style="border-radius: 5px; margin-bottom: 10px;">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu" style="height: 5px; background: #3a8fce;">
							<td>Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($mycart as $key =>$value)
						<tr>
							<td>
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
									<h4><span>{{number_format($total).' '.'₫'}}</span></h4>
								</p>
							</td>
							<td>
								<?php 
								$customer_id = Session::get('customer_id');
								?>

								<form action="{{URL::to('/delete-cart')}}" method="POST">
									{{csrf_field()}}
								<input type="hidden" name="customer_id" value="{{$customer_id}}">
								<input type="hidden" name="book_id" value="{{$value->book_id}}">
								<button type="submit" style="color: black; border:0px; background: #fff;" aria-hidden="true"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
								</form>
							</td>
						</tr>
						@endforeach
						
					</tbody>
				</table>
			
		</div>
		<!-- 	<form action="{{URL::to('/')}}" method="POST" style="float: right;">
						{{csrf_field()}}
					<label style="color: #696763;"><i class="fa fa-ticket" aria-hidden="true"></i> B&B khuyến mãi: </label>
					<input type="text" name="coupon" value="" style="width: 200px; margin-left: 20px; border-radius: 5px; padding: 5px; border: 1px solid #d8d8d8;" placeholder="Nhập mã khuyến mãi">
					<button type="submit" class="btn btn-fefault cart add-to-cart" name="coupon" style="width: 80px; border-radius: 5px; margin-top: 7px;" 
									>Áp dụng</button>
			</form> -->
	</div>	

<div class="container" style="width: 350px; background: #fff; border-radius: 5px; margin-top: 10px; margin-bottom: 20px; float: right;">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px;">

				  <li style="font-size: 20px; font-weight: 1000; color: #3a8fce;">Tổng cộng</li>
				</ol>
						</div>	<form action="{{URL::to('/checkout')}}">
									{{csrf_field()}}
								<table class="table table-condensed total-result" style="background: #fff; width: 400px; margin-bottom: 10px;">
								<!-- 	<tr>
										<td style=" border:0px;">Tạm tính</td>
										<td style=" border:0px; float: right;">
										<?php
											$temp = 0 ;
											foreach($mycart as $key =>$value){
											$temp = $temp + $value->book_price * $value->quantity;}
										?>
										<span><b>{{number_format($temp).' '.'₫'}}</b></span>
									</td>
									</tr>
									<tr>
										<td style=" border:0px;">Giảm giá</td>
										<td style=" border:0px; float: right;">
											<?php
												$coupon = 0;
											?>
										{{number_format($coupon).' '.'₫'}}</td>
									</tr> -->
									<tr>
										<td style=" border:0px;">Tổng cộng</td>
										<td style=" border:0px; float: right; color: red;"><b>
											<?php
												$total_price = $temp - $coupon;
											?>
											{{number_format($total_price).' '.'₫'}}</b><br>
											
										</td>
										
									</tr>
									<tr><td style=" border:0px;"></td>
										<td style=" border:0px; float: right;"><span>(Đã bao gồm VAT nếu có)</span></td>
									</tr>
								</table>
								<?php 
									$customer_id = Session::get('customer_id');
									$address_id =  Session::get('add_id');
									?>
									<input type="hidden" name="customer_id" value="{{$customer_id}}">
								@foreach($address as $key =>$value)
									<input type="hidden" name="address_id" value="{{$value->address_id}}">
								@endforeach	
								@foreach($mycart as $key =>$value)
									<input type="hidden" name="book_id" value="{{$value->book_id}}">
								
								@endforeach
									<button type="submit" class="btn btn-fefault cart add-to-cart" name="add_to_cart" style="width: 280px; border-radius: 5px;" 
									><b>MUA NGAY</b></button>
								</form>
					</div>

<div class="container" style="width: 580px;  background: #fff; border-radius: 5px; margin-top: 10px; margin-bottom: 20px; float: left; padding-bottom: 5px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px;">

				  <li class="active" style=" font-weight: 1000; color: #3a8fce;">THÔNG TIN GIAO HÀNG</li>
				</ol>
						</div>	
							<div style="color: red;"><?php
									if($address == null)
										echo "Địa chỉ giao hàng trống, vui lòng thêm vào Sổ địa chỉ";
								?>
									
							</div>
								@foreach($address as $key =>$value)

								<table class="table table-condensed total-result" style="background: #fff; margin-bottom: 0px;">
									<tr>
										<td style="width: 50px; border:0px;">Họ tên</td>
										<td style=" border:0px;">
										<span><b>{{$value->customer_name}}</b></span>
									</td>
									</tr>
									<tr>
										<td style="width: 50px; border:0px;">SĐT</td>
										<td style=" border:0px;"><span><b>{{$value->customer_phone}}</b></span></td>
									</tr>
									<tr class="shipping-cost">
										<td style="width: 60px; border:0px;">Địa chỉ</td>
										<td style=" border:0px;"><span>{{$value->address_detail}}</span></td>										
									</tr>

								</table>
								<a href="{{URL::to('/chon-dia-chi/'.$value->customer_id)}}" style="float: right; margin-right: 10px;"> Thay đổi</a>
								@endforeach
					</div>

	</section>
	
@endsection
