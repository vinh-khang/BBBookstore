@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" style ="background:#00aeef; color: #fff; font-size: 20px;">
                            <b>Thêm tin tức</b>
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action = "{{URL::to('/save-news')}}" method="post" enctype="multipart/form-data" >
                                	{{csrf_field()}}
                                <div>   
                                <i class="fa fa-tasks" aria-hidden="true"></i>
                                <label>Thêm tin tức cho trang web</label>
                                      <div style ="float: right; font-weight: 1000; color: #33dd30;">
                                    <?php
                                        $message = Session::get('message');
                                        if($message){
                                            echo $message;
                                            Session::put('message',null);}
                                    ?>
                                </div>
                                </div>
                           
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" name ="news_title" class="form-control" id="exampleInputEmail1" placeholder="Nhập tiêu đề" required="">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name ="news_image" class="form-control" id="exampleInputEmail1"  accept="image/png, image/jpeg" required="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Người viết</label>
                                    <input type="text" name ="news_auth" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên người viết" required="">
                                </div>        
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea name ="news_desc" style ="resize: none;"  rows= "4" class="form-control" placeholder="Nhập mô tả" required=""></textarea>  
                                
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea name ="news_content" style ="resize: none;"  rows ="20" class="form-control" id="ckeditor2" placeholder="Nhập nội dung" required="">  
                                    </textarea>
                                </div>
                                <div class="form-group">
                                	<label for="exampleInputPassword1">Loại tin</label>
                                     <select name = "news_type" class="form-control input-sm m-bot15">
		                                <option value="1">Tin mới</option>
		                                <option value="2">Review sách</option>
		                                <option value="3">Thông báo</option>
		                            </select>
                                </div>
                                <button type="submit" name ="add_news" class="btn btn-info">Thêm tin</button>
                          
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
          
        </div>

@endsection