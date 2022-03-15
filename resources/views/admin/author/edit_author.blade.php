@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading"  style ="background:#00aeef; color: #fff; font-size: 20px;">
                            <b>Cập nhật tác giả</b> 
                        </header>

                        <div class="panel-body">
                            @foreach($edit_author as $key => $edit_value)
                        	
                            <div class="position-center">
                                <form role="form" action = "{{URL::to('/update-author/'.$edit_value->author_id)}}" method="post" enctype="multipart/form-data">
                                <div>   
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <label>Chỉnh sửa thông tin cho tác giả</label>
                                </div>    
                                	{{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Tác giả</label>
                                    <input type="text" value ="{{$edit_value->author_name}} " name ="author_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên Tác giả" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh</label>
                                    <input type="file" name ="author_image" class="form-control" id="exampleInputEmail1"  accept="image/png, image/jpeg" >
                                    <img src="{{URL::to('/public/upload/author/'.$edit_value->author_image)}}" height =100 width = 100>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiểu sử</label>
                                    <textarea name ="author_biography" style ="resize: none;"  rows ="9" class="form-control" id="ckeditor1" >{{$edit_value->author_biography}}  
                                    </textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                     <select name = "author_status" class="form-control input-sm m-bot15">
                                        <option value="0">Hiển thị</option>
                                        <option value="1">Ẩn</option>
                                 
                                    </select>
                                </div>
                                <button type="submit" name ="add_author_product" class="btn btn-info">Cập nhật Tác giả</button>
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