@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" style ="background:#00aeef; color: #fff; font-size: 20px;">
                            <b>Thêm sách</b>
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action = "{{URL::to('/save-book')}}" method="post" enctype="multipart/form-data" >
                                	{{csrf_field()}}
                                <div>   
                                <i class="fa fa-tasks" aria-hidden="true"></i>
                                <label>Nhập thông tin cho sách</label>
                                      <div style ="float: right; font-weight: 1000; color: #33dd30;">
                                    <?php
                                        $message = Session::get('message');
                                        if($message){
                                            echo $message;
                                            Session::put('message',null);}
                                    ?>
                                </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sách</label>
                                    <input type="text" name ="book_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sách" required="">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name ="book_image" class="form-control" id="exampleInputEmail1"  accept="image/png, image/jpeg" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tác giả</label>
                                    <input type="text" name ="author" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên tác giả" required="">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Nhà xuất bản</label>
                                     <label for="exampleInputEmail1" style ="float:right; margin-right: 235px;">Số lượng</label>
                                    <input type="text" name ="pub_house" class="form-control" style ="width: 440px;" placeholder="Nhập NXB" required="">
                                    <input type="number" name ="book_qty" min = 1 class="form-control" style ="width: 300px; float:right; margin-top: -34px;" id="exampleInputEmail1" placeholder="Nhập số lượng" required="">
                                </div>

                                   <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <label for="exampleInputEmail1" style ="float:right; margin-right: 200px;">Năm xuất bản</label>
                                    <input type="number" name ="book_price" class="form-control" style ="width: 440px;" id="exampleInputEmail1" placeholder="Nhập giá" required="">
                                    <input type="text" name ="publishing_year" class="form-control" style ="width: 300px; float:right; margin-top: -34px;" min="1900" placeholder="Nhập năm xuất bản" required="">
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Kích thước</label>
                                    <label for="exampleInputEmail1" style ="float:right; margin-right: 240px;">Số trang</label>
                                    <input type="text" name ="book_size" class="form-control" style ="width: 440px;" id="exampleInputEmail1" placeholder="Nhập kích thước" required="">
                                    <input type="number" name ="page" min = 1 class="form-control" style ="width: 300px; float:right; margin-top: -34px;" placeholder="Nhập số trang" required="">
                                </div>
                             
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sách</label>
                                    <textarea name ="book_desc" style ="resize: none;"  rows ="9" class="form-control" id="ckeditor1" placeholder="Nhập mô tả" required="">  
                                    </textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sách</label>
                                     <select name = "cate_book" class="form-control input-sm m-bot15">
                                        @foreach($cate as $key => $category)
                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Nhà phát hành</label>
                                     <select name = "pub_book" class="form-control input-sm m-bot15">
                                        @foreach($pub as $key => $publisher)
                                        <option value="{{$publisher->publisher_id}}">{{$publisher->publisher_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                	<label for="exampleInputPassword1">Hiển thị</label>
                                     <select name = "book_status" class="form-control input-sm m-bot15">
		                                <option value="0">Hiển thị</option>
		                                <option value="1">Ẩn</option>
		                         
		                            </select>
                                </div>
                                <button type="submit" name ="add_book" class="btn btn-info">Thêm sách</button>
                          
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
          
        </div>

@endsection