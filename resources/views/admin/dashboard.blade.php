@extends('admin_layout')
@section('admin_content')
<div class="col-sm-12">        
	<div class="container" style="width: 260px; height: 100px; background: #fff; border-radius: 5px; margin-top: 10px; margin-bottom: 20px; float: left; border-left: 6px solid #00adee;">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px; background: #fff;">
				  <li style="">
				  	<h5 class="title text-center" style ="padding: 5px; color: #666; text-align: left; border-bottom: 3px solid #00adee; margin-bottom: 10px;"><i class="fa fa-money" aria-hidden="true" style ="color: #00adee;margin-right: 10px;"></i><b>Doanh thu tháng này kia<b></h5>
				  </li>
				</ol>
			</div><h4 style="float: center;">{{number_format($total_sale)}}</h4>
	</div>
</div>
<br>
<div class="container" style="width: 350px; background: #fff; border-radius: 5px; margin-top: 10px; margin-bottom: 20px; float: right;">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin: 0px; background: #fff; padding-bottom: 0px;">
				  <li style=""><h5 class="title text-center" style ="padding: 5px; color: #666; text-align: left; border-bottom: 3px solid #00adee; margin-bottom: 10px;"><i class="fa fa-money" aria-hidden="true" style ="color: #00adee;margin-right: 10px;"></i><b>Đơn hàng gần nhất<b></h5></li>
				</ol>
						</div>
								
								<table class="table table-condensed total-result" style="background: #fff; width: 400px;">
									@foreach($order as $key => $value)
									<tr style="">
										<td style="border: 0px !important; padding: 10px !important;"><b>
											<a href="{{URL::to('/edit-book/'.$value->book_id)}}">
											{{$value->customer_name}}
										</b></td>
										<td style="border: 0px !important; color: #27c894; float: right; padding: 5px !important;">
										<span><b>+ {{number_format($value->total_price)}}</b></span>
									</td>
									</tr>
									@endforeach
								</table>
					</div>
@endsection
		
	