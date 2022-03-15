@extends('admin_layout')
@section('admin_content')


<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading"  style ="background:#00aeef; color: #fff; font-size: 20px;">
                            <b>Cập nhật Banner</b>
                        </header>
     
                        <div class="panel-body">
                            @foreach($edit_banner as $key => $edit_value)
                        	
                            <div class="position-center">
                                <form role="form" action = "{{URL::to('/update-banner/'.$edit_value->id)}}" method="post" enctype="multipart/form-data" >
                                	{{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Banner</label>
                                    <input type="text" value ="{{$edit_value->banner_name}} " name ="banner_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên Banner" required="">
                                </div>
                                   <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name ="banner_image" class="form-control" id="exampleInputEmail1"  accept="image/png, image/jpeg">
                                    <img src="{{URL::to('/public/upload/banner/'.$edit_value->banner_image)}}" height =100 width = 500>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea name ="banner_desc" style ="resize: none;"  rows ="9" class="form-control" id="exampleInputPassword1">{{$edit_value->banner_desc}}  
                                    </textarea>
                                </div>
                                
                                <button type="submit" name ="update_banner" class="btn btn-info">Cập nhật Banner</button>
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