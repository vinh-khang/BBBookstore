@extends('admin_layout')
@section('admin_content')


<div class="row" >
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" style ="background:#00aeef; color: #fff; font-size: 20px;">
                            <b>Thêm tác giả</b>
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action = "{{URL::to('/save-author')}}" method="post"  enctype="multipart/form-data">
                                	{{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tác giả</label>
                                    <input type="text" name ="author_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên tác giả" required="">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name ="author_image" class="form-control" id="exampleInputEmail1"  accept="image/png, image/jpeg" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tiểu sử tác giả</label>
                                    <textarea name ="author_biography" style ="resize: none;"  rows ="9" class="form-control" id="ckeditor1" placeholder="Tiểu sử tác giả">  
                                    </textarea>
                                </div>
                                <div class="form-group">
                                	<label for="exampleInputPassword1">Hiển thị</label>
                                     <select name = "author_status" class="form-control input-sm m-bot15">
		                                <option value="0">Hiển thị</option>
		                                <option value="1">Ẩn</option>
		                         
		                            </select>
                                </div>
                                <button type="submit" name ="add_author" class="btn btn-info">Thêm tác giả</button>
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