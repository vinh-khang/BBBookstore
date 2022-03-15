@extends('frame')
@section('frame_content')
<div class="features_items" style="background: #fff; border-radius: 5px;">
	<header class="panel-heading" style ="background:#00aeef; color: #fff; font-size: 20px; text-align: center;">
                            <b>THÊM THẺ TÍN DỤNG</b>
                        </header>
	<section id="form" style="margin-bottom: 40px; margin-top: 10px;"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<form action="{{URL::to('/save-card')}}" method="POST">
							{{csrf_field()}}
							<label style="margin-top: 10px; color: #696763;">Số thẻ:</label>
							<input type="text" name = "card_number" value="" placeholder="VD: 1234 1234 1234 1234" />
							<label style="color: #696763;">Tên in trên thẻ:</label>
							<input type="password" name = "card_name" value="" placeholder="VD: NGUYEN VAN A" />
							<label style="margin-top: 10px; color: #696763;">Ngày hết hạn:</label>
							<input type="text" name = "card_day" value="" placeholder="MM/YY" />
							<label style="margin-top: 10px; color: #696763;">Mã bảo mật:</label>
							<input type="text" name = "card_ser" value="" placeholder="VD: 123" />
							<button type="submit" class="" style="">Xác nhận</button>
						</form>
					</div>  
					<div style ="float: left; font-weight: 1000; color: #33dd30; margin-top: 20px;">
                                    <?php
                                        $message = Session::get('message');
                                        if($message){
                                            echo $message;
                                            Session::put('message',null);}
                                    ?><!--/sign up form-->
				</div><!--/login form-->
				</div>

	</section>
</div>
<!--/form-->
@endsection