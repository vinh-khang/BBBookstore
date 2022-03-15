@extends('admin_layout')
@section('admin_content')
 <div class="panel panel-default" style="padding-bottom: 20px;">  
    <div class="panel-heading">
      <b>THÊM SÁCH YÊU THÍCH</b>
    </div>
    <div class="row w3-res-tb">
        <div class="col-sm-12" >
                         <form action ="{{URL::to('/search-favorite/')}}" method="POST" style="">
                            {{csrf_field()}}
                                    <label for="exampleInputEmail1">Tìm kiếm sách và thêm</label>
                                    <input type="text" name ="book_name" class="form-control" style ="width: 500px;" id="exampleInputEmail1" placeholder="Nhập tên sách" value="{{$book_keyword}}" required="" style="">
                                     <button type="submit" name ="search_book_author" class="btn btn-info" style="float: right; margin-top: -34px; margin-right: 580px; padding: 5px 50px 5px 50px;"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>

                      
        </div>

      <div class="col-sm-12">
        @yield('book_content')

  </div>
</div></div>


  <div class="panel panel-default">
    <div class="panel-heading">
      <b>SÁCH YÊU THÍCH</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
         <i class="fa fa-tasks" aria-hidden="true"></i>
         <label>Liệt kê tất cả sách yêu thích:</label>               
      </div>
      <div class="col-sm-7">
              <div style ="float: right; font-weight: 1000; color: #33dd30;">
                                    <?php
                                        $message = Session::get('message');
                                        if($message){
                                            echo $message;
                                            Session::put('message',null);}
                                    ?>
                                </div>
      </div>
    </div>
    <div class="table-responsive">     
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
            </th>
            <th>Tên sách</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Danh mục</th>
            <th>NPH</th>
            <th>Tác giả</th>

            <th style="width:20px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($favorite as $key => $book)
          <tr>
            <td></td>
            <td>{{$book->book_name}}</td>
            <td><img src ="public/upload/book/{{$book->book_image}}" height = "100" width = "80" ></td>
            <td>{{$book->book_price}}</td>
            <td>{{$book->category_name}}</td>
            <td>{{$book->publisher_name}}</td>
            <td>{{$book->author}}</td>
            <td>
              <a onclick=" return confirm('Bạn có muốn xóa yêu thích không?')" href="{{URL::to('/delete-favorite/'.$book->book_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>


  </div>

@endsection