@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9" style="background-image: linear-gradient(315deg, #00adee 0%, #09c6f9 74%);
 border-radius: 5px; width: 69%;">        
	<div class="container" style="width: 200px; height: 80px; background: #fff; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; float: left;">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px; background: #fff; padding: 0px;">
				  <li style="">
				  	<h5 class="title text-center" style ="padding: 5px;text-align: left; margin-bottom: 10px; color: #3a8fce;  font-weight: 1000;"> DOANH THU/THÁNG</h5>

				  </li>
				</ol>
			</div><h4 style="margin-left: 10px; font-weight: 1000; color: #7a7a7a;"><i class="fa fa-line-chart" style="color: #00adee; margin-right: 10px;"></i> {{number_format($total_sale).' '.'₫'}}</h4>
	</div>

	<div class="container" style="width: 200px; height: 80px; background: #fff; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; float: left;  margin-left: 10px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px; background: #fff; padding: 0px;">
				  <li style="">
				  	<h5 class="title text-center" style ="padding: 5px;text-align: left; margin-bottom: 10px; color: #3a8fce;  font-weight: 1000;">ĐƠN HÀNG/THÁNG</h5>

				  </li>
				</ol>
			</div><h4 style="margin-left: 10px; font-weight: 1000; color: #7a7a7a;"><i class="fa fa-shopping-cart" style="color: #00adee; margin-right: 10px;"></i> {{$count_order}} ĐƠN</h4>
	</div>

	<div class="container" style="width: 200px; height: 80px; background: #fff; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; float: left;  margin-left: 10px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px; background: #fff; padding: 0px;">
				  <li style="">
				  	<h5 class="title text-center" style ="padding: 5px;text-align: left; margin-bottom: 10px; color: #3a8fce;  font-weight: 1000;">SỐ SÁCH</h5>

				  </li>
				</ol>
			</div><h4 style="margin-left: 10px; font-weight: 1000; color: #7a7a7a;"><i class="fa fa-book" style="color: #00adee; margin-right: 10px;"></i>{{$count_book}}</h4>
	</div>

	<div class="container" style="width: 200px; height: 80px; background: #fff; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; float: left; margin-left: 10px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px; background: #fff; padding: 0px;">
				  <li style="">
				  	<h5 class="title text-center" style ="padding: 5px;text-align: left; margin-bottom: 10px; color: #3a8fce;  font-weight: 1000;">SỐ TÀI KHOẢN</h5>

				  </li>
				</ol>
			</div><h4 style="margin-left: 10px; font-weight: 1000; color: #7a7a7a;"><i class="fa fa-users" style="color: #00adee; margin-right: 10px;"></i> {{$count_cus}}</h4>
	</div>

</div>

<div class="col-sm-3" style="float: right; width: 28%; "> 
    <?php
    	$day_calendar = date('d-m-Y');
    	$week_calendar_array = array('Chủ nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư','Thứ Năm','Thứ Sáu', 'Thứ Bảy');
		$week_calendar = $week_calendar_array[date('w')];
    ?>
    <div style="background: #f5f5f5; padding: 10px; border-radius: 25px; font-weight: 700; color: #7a7a7a; width: 320px;">
	    <span><i class="fa fa-calendar-o" style="margin-right: 10px;"></i> Hôm nay: {{$week_calendar}}, {{$day_calendar}}</span>
	</div>	  
<div class="container" style="width: 350px; background: #fff; border-radius: 5px;  margin-bottom: 10px; float: right; padding: 10px; ">
                            <a href="{{URL::to('/')}}" style="margin-left: 25px;"><img src="{{asset('public/frontend/images/logo/booklogo.png')}}" style ="width: 300px;" alt="" /></a>
                             <div class="single-widget" style="">
                             <div class="companyinfo" style="margin-top: 10px; font-weight: 1000; margin-left: 45px;">
                             <h5><b style="color: #7a7a7a;">CỬA HÀNG SÁCH <span style="color: #00adee;">BOOK & BOOKS</b></span></h5></div></div>
                            </div> 

                       


<div class="container" style="width: 350px; border-radius: 5px; float: right; background: #fff; padding: 10px; margin-bottom: 10px;">
	<div style="padding-bottom: 10px;">
		 <div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px; background: #fff; padding: 0px;">
				  <li style="">
				  	<a href="{{URL::to('/all-order')}}" style=""><h5 class="title text-center" style ="padding: 5px;text-align: left; color: #3a8fce;  font-weight: 1000;"> TRẠNG THÁI ĐƠN HÀNG</h5></a>

				  </li>
				</ol>
			</div>
		 	


			<h5 style="margin-left: 10px; color: #696763; padding: 7px;">
				<i class="fa fa-clock-o" style="margin-right: 10px; color: #00adee; "></i><b>Chờ xác nhận</b>
				<span class="pull-right" > {{$new_order_count}} đơn</span>  
										<div class="progress progress-striped active progress-right" style="margin-right: 20px;">
											<div class="bar red" style="width:{{$new_order_count *10}}%;"></div> 
										</div>

			</h5>
			<h5 style="margin-left: 10px; color: #696763 ; padding: 7px;">
				<i class="fa fa-check-circle-o" style="margin-right: 10px; color: #00adee ;"></i><b> Đã xác nhận</b>
				<span class="pull-right" > {{$accepted_order_count}} đơn</span>  
										<div class="progress progress-striped active progress-right" style="margin-right: 20px;">
											<div class="bar green" style="width:{{$accepted_order_count *10}}%;"></div> 
										</div>
			</h5>
			<h5 style="margin-left: 10px; color: #696763; padding: 7px;">
				<i class="fa fa-truck" style="margin-right: 10px; color: #00adee;"></i><b> Đang vận chuyển</b>
				<span class="pull-right" > {{$trans_order_count}} đơn</span>  
										<div class="progress progress-striped active progress-right" style="margin-right: 20px;">
											<div class="bar blue" style="width:{{$trans_order_count *10}}%;"></div> 
										</div>
			</h5>
		</div>
	</div>



</div>
</div>

<div class="col-md-9" style=" width: 34%; padding: 0px; margin-top: 10px; ">
					<div class="agile-last-grid" style="padding: 10px; background: #fff;">
						<div class="breadcrumbs">
							<ol class="breadcrumb" style="margin: 0px; background: #fff; padding: 0px;">
							  <li style="">
							  	<a href="{{URL::to('/revenue')}}" style=""><h5 class="title text-center" style ="padding: 5px;text-align: left; color: #7a7a7a;  font-weight: 1000;"> DOANH SỐ THEO NGÀY</h5></a>

							  </li>
							</ol>
						</div>
						<div id="graph9" style="height: 170px; margin-top: 0px;"></div>
						<?php
							$day_data ='';
							$order_data ='';
							$day_array = array();
							$order_array = array();
							$order_time_array = array();
							$i = 14;
							foreach($static as $key => $value){
								$day_array[$i] = $value->total_sales;
								$order_array[$i] = $value->total_order;
								$order_time_array[$i] = $value->order_date;
								$i--;
							}
							for($j=1;$j<=14;$j++){
								$day_data .= "{ elapsed:'".$order_time_array[$j]."', Doanh_thu:".$day_array[$j]."}, ";
								$order_data .= "{ period:'".$order_time_array[$j]."', so_don:".$order_array[$j]."}, ";
							}
							$day_data = substr($day_data, 0, -2);
							$order_data = substr($order_data, 0, -2);
						?>
						
						<script>
						Morris.Line({
						  element: 'graph9',
						  lineColors: ['#00adee'],
						  data: [<?php echo $day_data; ?>],
						  xkey: 'elapsed',
						  ykeys: ['Doanh_thu'],
						  labels: ['Doanh thu'],
						  fillOpacity:0.85,
						  parseTime: false
						});
						</script>

					</div>
				</div>
<div>

<div class="col-md-9" style=" width: 34%; padding: 0px; margin-top: 10px; margin-left: 10px;">
					<div class="agile-last-grid" style= "padding: 10px; background: #fff;">
						<div class="breadcrumbs">
							<ol class="breadcrumb" style="margin: 0px; background: #fff; padding: 0px;">
							  <li style="">
							  	<a href="{{URL::to('/revenue')}}" style=""><h5 class="title text-center" style ="padding: 5px;text-align: left; color: #7a7a7a;  font-weight: 1000;"> SỐ ĐƠN THEO NGÀY</h5></a>

							  </li>
							</ol>
						</div>
						<div id="graph8" style=" height: 170px; "></div>
						<script>
						/* data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type */
						Morris.Bar({
						  element: 'graph8',
						  barColors: ['#00adee'],
						  data: [<?php echo $order_data; ?>],
						  xkey: 'period',
						  ykeys: ['so_don'],
						  labels: ['Số đơn'],
						  xLabelAngle: 0
						});
						</script>
					</div>
				</div>
</div>

<div class="col-md-8 stats-info stats-last widget-shadow" style="padding-left: 0px; width: 35%; ">
						<div class="stats-last-agile" style="padding: 10px; background: #fff; margin-top: 10px;">
							 <div class="breadcrumbs">
								<ol class="breadcrumb" style="margin: 0px; background: #fff; padding: 0px;">
								  <li style="">
								  	<a href="{{URL::to('/all-stock-book')}}" style=""><h5 class="title text-center" style ="padding: 5px;text-align: left; color: #3a8fce;  font-weight: 1000;">QUẢN LÝ KHO HÀNG</h5></a>

								  </li>
								</ol>
							</div>
							<table class="table stats-table ">
								<thead>
									<tr >
										<th style="color: #7a7a7a;">STT</th>
										<th style="color: #7a7a7a;">Trạng thái</th>
										<th style="color: #7a7a7a;">Số sản phẩm</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">1</th>
										<td><h5 style="color: #7a7a7a;">Hết hàng</h5></td>
										<td><span class="label label-danger"><b>{{$hethang}} sản phẩm</b></span></td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td><h5 style="color: #7a7a7a;">Còn 5 sản phẩm</h5></td>
										<td><span class="label label-warning"><b>{{$nho5}} sản phẩm</b></span></td>
									</tr>
									<tr>
										<th scope="row">3</th>
										<td><h5 style="color: #7a7a7a;">Còn 10 sản phẩm</h5></td>
										<td><span class="label label-info"><b>{{$nho10}} sản phẩm</b></span></td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>


<div class="col-md-8 stats-info stats-last widget-shadow" style="padding-left: 0px; width: 65%; ">
						<div class="stats-last-agile" style="padding: 10px; background: #fff; height: 260px;">
							 <div class="breadcrumbs">
								<ol class="breadcrumb" style="margin: 0px; background: #fff; padding: 0px;">
								  <li style="">
								  	<a href="{{URL::to('/all-order')}}" style=""><h5 class="title text-center" style ="padding: 5px;text-align: left; color: #3a8fce;  font-weight: 1000;"> ĐƠN HÀNG CHƯA XÁC NHẬN</h5></a>

								  </li>
								</ol>
							</div>
							<table class="table stats-table ">
								<thead>
									<tr >
										<th style="color: #7a7a7a;">Mã đơn</th>
										<th style="color: #7a7a7a;">Khách hàng</th>
										<th style="color: #7a7a7a;">Thời gian</th>
										<th style="color: #7a7a7a;">Số tiền</th>
									</tr>
								</thead>
								<tbody>
									@foreach($order as $key => $value)
									<tr>
										<th><a href="{{URL::to('/view-order/'.$value->order_id)}}" class="active" ui-toggle-class="">
               <h5 style="">{{$value->order_id}}</h5></a></th>
										<td><h5 style="color: #7a7a7a;">{{$value->customer_name}}</h5></td>
										<td><h5 style="color: #7a7a7a;">{{$value->order_time}}</h5></td>
										<td><h5 style="color: #3a8fce;">{{number_format($value->total_price).' '.'₫'}}</h5></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
</div>
</div>


@endsection
		
	