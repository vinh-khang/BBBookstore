@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading"  style ="background:#00aeef; color: #fff; font-size: 20px;">
                            <b>Cập nhật sách</b>
                        </header>
                        <div class="panel-body">
                          
                            <div class="position-center">
                                @foreach($edit_book as $key => $book)
                                <form role="form" action = "{{URL::to('/update-book/'.$book->book_id)}}" method="post" enctype="multipart/form-data" >
                                <div>   
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                <label>Chỉnh sửa thông tin cho sách</label>
                                </div>
                                <br>
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sách</label>
                                    <input type="text" name ="book_name" class="form-control" id="exampleInputEmail1" value ="{{$book->book_name}}" required="">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name ="book_image" class="form-control" id="exampleInputEmail1"  accept="image/png, image/jpeg" >
                                    <img src="{{URL::to('/public/upload/book/'.$book->book_image)}}" height =100 width = 100>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tác giả</label>
                                    <input type="text" name ="author" class="form-control" id="exampleInputEmail1" value ="{{$book->author}}" required="">

                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Nhà xuất bản</label>
                                    <label for="exampleInputEmail1" style ="float:right; margin-right: 235px;">Số lượng</label>
                                    <input type="text" name ="pub_house" class="form-control" id="exampleInputEmail1" style ="width: 440px;" value ="{{$book->pub_house}}" required="">                                
                                    <input type="number" name ="book_qty" min = 0 class="form-control" style ="width: 300px; float:right; margin-top: -34px;" value ="{{$book->book_qty}}" required="">
                                </div>

                                   <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <label for="exampleInputEmail1" style ="float:right; margin-right: 200px;">Năm xuất bản</label>
                                    <input type="number" name ="book_price" min = 1 class="form-control" style ="width: 440px;" id="exampleInputEmail1" value ="{{$book->book_price}}" required="" >
                                    <input type="text" name ="publishing_year" min = 1900  class="form-control" style ="width: 300px; float:right; margin-top: -34px;" id="exampleInputEmail1" value ="{{$book->publishing_year}}" required="">
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Kích thước</label>
                                    <label for="exampleInputEmail1" style ="float:right; margin-right: 240px;">Số trang</label>
                                    <input type="text" name ="book_size" class="form-control" style ="width: 440px;" id="exampleInputEmail1" value ="{{$book->book_size}}" required="">
                                    <input type="text" name ="page" class="form-control" min = 1 style ="width: 300px; float:right; margin-top: -34px;" id="exampleInputEmail1" value ="{{$book->page}}" required="">
                                </div>
                             
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sách</label>
                                    <textarea name ="book_desc" style ="resize: none;"  rows ="9" class="form-control" id="ckeditor1" style="width: 1200px;" >{{$book->book_desc}}  
                                    </textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sách</label>
                                     <select name = "cate_book" class="form-control input-sm m-bot15">
                                        @foreach($cate as $key => $category)
                                        @if($category->category_id == $book->category_id)
                                        <option selected value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @else
                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Nhà phát hành</label>
                                     <select name = "pub_book" class="form-control input-sm m-bot15">
                                        @foreach($pub as $key => $publisher)
                                        @if($publisher->publisher_id == $book->publisher_id)
                                        <option selected value="{{$publisher->publisher_id}}">{{$publisher->publisher_name}}</option>
                                        @else
                                         <option value="{{$publisher->publisher_id}}">{{$publisher->publisher_name}}</option>
                                         @endif
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
                                <button type="submit" name ="add_book" class="btn btn-info">Cập nhật sách</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
          
        </div>

@endsection