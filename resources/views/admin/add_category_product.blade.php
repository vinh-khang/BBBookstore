@extends('admin_layout')
@section('admin_content')

            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" style ="color: #fff; font-size: 20px;">
                            <b>Thêm danh mục sản phẩm</b> 
                        </header>
                        <div class="panel-body">
                       
                            <div class="position-center">
                                <form role="form" action = "{{URL::to('/save-category-product')}}" method="post">
                                	{{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name ="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea name ="category_product_desc" style ="resize: none;"  rows ="9" class="form-control" id="exampleInputPassword1" placeholder="Nhập mô tả">  
                                    </textarea>
                                </div>
                                <div class="form-group">
                                	<label for="exampleInputPassword1">Hiển thị</label>
                                     <select name = "category_product_status" class="form-control input-sm m-bot15">
		                                <option value="0">Hiển thị</option>
		                                <option value="1">Ẩn</option>
		                         
		                            </select>
                                </div>
                                <button type="submit" name ="add_category_product" class="btn btn-info">Thêm danh mục</button>
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
          
@endsection