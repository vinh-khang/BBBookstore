@extends('pages.customer.customer_layout')
@section('customer_content')

<section id="cart_items">
	<div style="height: 350px;">
		<div class="container" style="width: 945px; float: left; background: #00adee; border-radius: 5px; height: 300px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px;">

				  <li class="active" style="font-size: 20px; font-weight: 1000; color: #fff; text-align: center; margin-left: 350px; margin-top: 70px;"><i class="fa fa-check-circle" aria-hidden="true" style="font-size: 40px;"></i><br>ĐẶT HÀNG THÀNH CÔNG</li>
				</ol>

			</div>
			<div style="margin-left: 200px;">
			<a class="btn btn-fefault cart add-to-cart" href="{{URL::to('/trang-chu')}}" style="margin-top: 80px; width: 230px; border-radius: 5px; border: 2px solid #fff;" 
									><b>VỀ TRANG CHỦ</b></a>
				<?php
                        $customer_id = Session::get('customer_id');
                 ?>									
			<a class="btn btn-fefault cart add-to-cart" href="{{URL::to('/don-hang-cua-toi/'.$customer_id)}}" style="margin-top: 80px; width: 230px; border-radius: 5px; border: 2px solid #fff;" 
									><b>XEM ĐƠN HÀNG</b></a>
			</div>
		</div>
	</div>
	</section>
	
@endsection
