@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" style ="color: #fff; font-size: 20px;">
                            <b>Thêm banner</b> 
                        </header>
                        <div class="panel-body">
                       
                            <div class="position-center">
                                <form role="form" action = "{{URL::to('/save-banner')}}" method="post" enctype="multipart/form-data">
                                	{{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Banner</label>
                                    <input type="text" name ="banner_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh Banner</label>
                                    <input type="file" name ="banner_image" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục" accept="image/png, image/jpeg" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả Banner</label>
                                    <textarea name ="banner_desc" style ="resize: none;"  rows ="3" class="form-control" id="exampleInputPassword1" placeholder="Nhập mô tả" >  
                                    </textarea>
                                </div>
                                <div class="form-group">
                                	<label for="exampleInputPassword1">Hiển thị</label>
                                     <select name = "banner_status" class="form-control input-sm m-bot15">
		                                <option value="0">Hiển thị</option>
		                                <option value="1">Ẩn</option>
		                         
		                            </select>
                                </div>
                                <button type="submit" name ="add_banner" class="btn btn-info">Thêm Banner</button>
                                <div style ="float: right; font-weight: 1000; color: #33dd30;">
                                    <?php
                                        $message = Session::get('message');
                                        if($message){
                                            echo $message;
                                            Session::put('message',null);}
                                    ?>
                                </div>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
          
        </div>
@endsection