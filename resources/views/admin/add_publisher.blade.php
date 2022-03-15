@extends('admin_layout')
@section('admin_content')


<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" style ="background:#00aeef; color: #fff; font-size: 20px;">
                            <b>Thêm Nhà phát hành</b>
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action = "{{URL::to('/save-publisher')}}" method="post">
                                	{{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Nhà phát hành</label>
                                    <input type="text" name ="publisher_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea name ="publisher_desc" style ="resize: none;"  rows ="9" class="form-control" id="exampleInputPassword1" placeholder="Nhập mô tả">  
                                    </textarea>
                                </div>
                                <div class="form-group">
                                	<label for="exampleInputPassword1">Hiển thị</label>
                                     <select name = "publisher_status" class="form-control input-sm m-bot15">
		                                <option value="0">Hiển thị</option>
		                                <option value="1">Ẩn</option>
		                         
		                            </select>
                                </div>
                                <button type="submit" name ="add_publisher" class="btn btn-info">Thêm Nhà phát hành</button>
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