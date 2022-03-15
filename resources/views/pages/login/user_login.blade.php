@extends('frame')
@section('frame_content')
<?php
	if($customer_phone != null){

	}elseif(Cookie::get('customer_phone')){
		$customer_phone = Cookie::get('customer_phone');
		$customer_password = Cookie::get('customer_password');
	}
?>
<div class="features_items" style="background: #fff; border-radius: 5px; margin-bottom: 10px;">
	<header class="panel-heading" style ="background:#00aeef; color: #fff; font-size: 20px; text-align: center;">
                            <b>ĐĂNG NHẬP / ĐĂNG KÝ TÀI KHOẢN</b>
                        </header>
<section id="form" style="margin-bottom: 40px; margin-top: 10px;"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h5 style="margin: 0px 0px 0px 45px; color: #696763; padding: 5px;"><b>ĐĂNG NHẬP TÀI KHOẢN</b></h5>
						<form action="{{URL::to('/login-customer')}}" method="POST">
							{{csrf_field()}}
							<label style="margin-top: 10px; color: #696763;">Số điện thoại</label>
							<input type="text" name = "customer_phone" value="{{$customer_phone}}" placeholder="Nhập số điện thoại" required="" pattern="0[0-9]{9}" title="Sai định dạng số điện thoại" style="background: #fff; border: 1px solid #cccccc; border-radius: 3px;"/>
							<label style="color: #696763;">Mật khẩu</label>
							<input type="password" name = "customer_password" value="{{$customer_password}}" placeholder="Nhập mật khẩu" required=""style="background: #fff; border: 1px solid #cccccc; border-radius: 3px;" />
							<span>
								<input type="checkbox" class="checkbox" name="remember"> 
								Ghi nhớ tôi
							</span>
							<button type="submit" style="width: 290px;"><b>Đăng nhập</b></button>
						</form>
					</div>  
					
					<div style ="float: left; font-weight: 1000; color: #33dd30; margin-top: 20px;">
                                    <?php
                                        $message_g = Session::get('message-g');
                                        if($message_g){
                                            echo $message_g;
                                            Session::put('message-g',null);}
                                    ?>
                                </div>
                    <div style ="float: left; font-weight: 1000; color: #ff5050; margin-top: 20px;">
                                    <?php
                                        $message_b = Session::get('message-b');
                                        if($message_b){
                                            echo $message_b;
                                            Session::put('message-b',null);}
                                    ?>
                                </div>
                        <img src ="public/frontend/images/logo/4957136.jpg" height = "230" style="margin-top: 0px; margin-left: 35px;">              
				</div>

				<div class="col-sm-4" style="margin-left: 80px;">
					<div class="signup-form"><!--sign up form-->
						<h5 style="margin: 0px 0px 0px 35px; color: #696763; padding: 5px;"><b>ĐĂNG KÝ TÀI KHOẢN MỚI</b></h5>
						<form action="{{URL::to('/add-customer')}}" method="POST">
							{{csrf_field()}}
							<label style="margin-top: 10px; color: #696763;">Họ tên</label>
							<input type="text" name="customer_name" placeholder="Nhập họ tên" required="" style="background: #fff; border: 1px solid #cccccc; border-radius: 3px;" />
							<label style="color: #696763;">Số điện thoại</label>
							<input type="text" name="customer_phone" placeholder="Nhập số điện thoại" required=""style="background: #fff; border: 1px solid #cccccc; border-radius: 3px;" pattern="0[0-9]{9}"  title="Sai định dạng số điện thoại"/>
							<label style="color: #696763;">Email</label>
							<input type="email" name="customer_email" placeholder="Nhập Email" required=""style="background: #fff; border: 1px solid #cccccc; border-radius: 3px;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  title="Sai định dạng Email"/>
							<label style="color: #696763;">Mật khẩu</label>
							<input type="password" name="customer_password" placeholder="Nhập mật khẩu" required="" style="background: #fff; border: 1px solid #cccccc; border-radius: 3px;"/>
							<label style="color: #696763;">Nhập lại mật khẩu</label>
							<input type="password" name="customer_password_2" placeholder="Nhập lại mật khẩu" required="" style="background: #fff; border: 1px solid #cccccc; border-radius: 3px;"/>
							
							<button type="submit" class="" style="margin-top: 20px; width: 290px;"><b>Đăng ký</b></button>
						</form>
					</div>
					 
			</div>
		</div>
	</section>
</div>
<!--/form-->
@endsection