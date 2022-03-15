@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" style ="background:#00aeef; color: #fff; font-size: 20px;">
                            <b>Cập nhật tin tức</b>
                        </header>
                        @foreach($edit_news as $key => $value)
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action = "{{URL::to('/update-news/'.$value->news_id)}}" method="post" enctype="multipart/form-data" >
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
                                    <input type="text" name ="news_title" class="form-control" value="{{$value->news_title}}" placeholder="Nhập tiêu đề" required="">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name ="news_image" class="form-control" accept="image/png, image/jpeg">
                                    <img src="{{URL::to('/public/upload/news/'.$value->news_image)}}" height = 100>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Người viết</label>
                                    <input type="text" name ="news_auth" class="form-control" value="{{$value->news_auth}}" placeholder="Nhập tên người viết" required="">
                                </div>        
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea name ="news_desc" style ="resize: none;"  rows= "4" class="form-control" placeholder="Nhập mô tả" required="">{{$value->news_desc}}</textarea>  
                                
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea name ="news_content" style ="resize: none;"  rows ="20" class="form-control" id="ckeditor2" placeholder="Nhập nội dung" required="">{!!$value->news_content!!}  
                                    </textarea>
                                </div>
                                <div class="form-group">
                                	<label for="exampleInputPassword1">Loại tin</label>
                                     <select name = "news_type" value="{{$value->news_type}}" class="form-control input-sm m-bot15">
                                         @if($value->news_type == 1)
                                        <option selected value="1">Tin tức</option>
                                        <option value="2">Review sách</option>
                                        <option value="3">Thông báo</option>                                         
                                         @endif

                                          @if($value->news_type == 2)
                                        <option value="1">Tin tức</option>
                                        <option  selected value="2">Review sách</option>
                                        <option value="3">Thông báo</option>                                         
                                         @endif

                                          @if($value->news_type == 3)
                                        <option value="1">Tin tức</option>
                                        <option value="2">Review sách</option>
                                        <option selected value="3">Thông báo</option>                                         
                                         @endif
		                            </select>
                                </div>

                                <button type="submit" class="btn btn-info">Cập nhật</button>
                          
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
          
        </div>

@endsection