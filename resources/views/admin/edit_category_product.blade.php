@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading"  style ="background:#00aeef; color: #fff; font-size: 20px;">
                            <b>Cập nhật danh mục sản phẩm</b> 
                        </header>
                        <div class="panel-body">
                            @foreach($edit_category_product as $key => $edit_value)
                        	
                            <div class="position-center">
                                <form role="form" action = "{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                                <div>   
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <label>Chỉnh sửa thông tin danh mục</label>
                                </div>    
                                	{{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value ="{{$edit_value->category_name}} " name ="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea name ="category_product_desc" style ="resize: none;"  rows ="9" class="form-control" id="exampleInputPassword1">{{$edit_value->category_desc}}  
                                    </textarea>
                                </div>
                                
                                <button type="submit" name ="add_category_product" class="btn btn-info">Cập nhật danh mục</button>
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