@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading"  style ="background:#00aeef; color: #fff; font-size: 20px;">
                            <b>Cập nhật bài viết cho cửa hàng</b>
                        </header>
     
                        <div class="panel-body">
                            @foreach($edit_bb_post as $key => $value)
                        	
                            <div class="position-center">
                                <form role="form" action = "{{URL::to('/update-bb-post/'.$value->news_id)}}" method="post" enctype="multipart/form-data" >
                                	{{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" value ="{{$value->news_title}} " name ="bb_title" class="form-control" id="exampleInputEmail1" placeholder="Nhập tiêu đề">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea name ="bb_content" style ="resize: none;"  rows ="9" class="form-control" id="ckeditor1">{!! $value->news_content !!}  
                                    </textarea>
                                </div>
                                
                                <button type="submit" name ="update_banner" class="btn btn-info">Cập nhật</button>
                                  <div style ="float: right; font-weight: 1000; color: #33dd30;">
            
                                </div>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
          
        </div>
@endsection