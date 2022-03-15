@extends('pages.support.support')
@section('support_content')

<div class="features_items" style="background: #fff; border-radius: 5px;"> 
<section id="form" style="margin-bottom: 40px; margin-top: 10px;"><!--form-->
        <div class="container">
            <div class="row">   
                <div class="col-sm-9" style="">
                    <div class="signup-form" style="margin-left: 50px;"> <!--sign up form-->
                        <h2 style="margin: 0px; color: #3a8fce; text-align: center;"><b> Đội ngũ hỗ trợ, chăm sóc khách hàng của B&B</b></h2>
                        <h5>B&B luôn sẵn sàng lắng nghe câu hỏi và ý kiến đóng góp từ bạn. Chúng tôi sẽ phản hồi ngay trong 24h tiếp theo!</h5>
                        <form action="{{URL::to('/send-support')}}" method="POST">
                            {{csrf_field()}}
                            <label style="margin-top: 10px; color: #696763;">Địa chỉ email của bạn (*)</label>
                            <input type="email" name="support_mail" placeholder="Nhập Email" required="" value="" style=" width: 800px; border-radius: 5px;"/>
                            <label style="color: #696763;">Số điện thoại (*)</label>
                            <input type="text" name="support_phone" placeholder="Nhập số điện thoại" required="" value="" style=" width: 800px; border-radius: 5px;"/>
                             <label style="color: #696763;">Mã đơn hàng</label>
                            <input type="text" name="support_order" placeholder="Bạn có thể nhập nhiều mã đơn hàng, cách nhau bởi dấu ','" required="" value="" style=" width: 800px; border-radius: 5px;"/>
                            <label style="color: #696763;">Tiêu đề (*)</label>
                            <input type="text" name="support_title" placeholder="Nhập tiêu đề" required="" value="" style=" width: 800px; border-radius: 5px;"/>
                            <label style="color: #696763;">Nội dung (*)</label><br>
                            <textarea type="text" name="support_content" required="" rows="5" placeholder="Nhập chi tiết vấn đề của bạn" style=" width: 800px; border-radius: 5px;"/></textarea><br>
                            <label style="color: #696763;">Tập tin đính kèm</label>
                            <input type="file" name="support_file" value="" style=" width: 800px; border-radius: 5px;"/>


                            <button type="submit" style="margin-top: 20px;">Gửi</button>
                        </form>
                    </div>
                     <div style ="float: left; font-weight: 1000; color: red; margin-top: 20px;">
                                    <?php
                                        $message_b = Session::get('message-b');
                                        if($message_b){
                                            echo $message_b;
                                            Session::put('message-b',null);}
                                    ?>
                                </div>
            </div>
        </div>
    </div>
</section></div>                
                    
        
                    
 @endsection