@extends('admin_layout')
@section('admin_content')


<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading"  style ="background:#00aeef; color: #fff; font-size: 20px;">
                            <b>Cập nhật Nhà phát hành</b>
                        </header>
                        <?php
                                $message = Session::get('message');
                                if($message){
                                    echo $message;
                                    Session::put('message',null);}
                            ?>
                        <div class="panel-body">
                            @foreach($edit_publisher as $key => $edit_value)
                        	
                            <div class="position-center">
                                <form role="form" action = "{{URL::to('/update-publisher/'.$edit_value->publisher_id)}}" method="post">
                                	{{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Nhà phát hành</label>
                                    <input type="text" value ="{{$edit_value->publisher_name}} " name ="publisher_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea name ="publisher_desc" style ="resize: none;"  rows ="9" class="form-control" id="exampleInputPassword1">{{$edit_value->publisher_desc}}  
                                    </textarea>
                                </div>
                                
                                <button type="submit" name ="add_publisher" class="btn btn-info">Cập nhật Nhà phát hành</button>
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