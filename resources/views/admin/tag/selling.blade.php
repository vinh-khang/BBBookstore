@extends('admin_layout')
@section('admin_content')

 <div class="panel panel-default" style="padding-bottom: 10px;">  
    <div class="panel-heading">
      <b>THÊM SÁCH BÁN CHẠY TRONG TUẦN</b>
    </div>
    <div class="row w3-res-tb">
        <div class="col-sm-12" >
                         <form action ="{{URL::to('/search-selling/')}}" method="POST" style="">

                            {{csrf_field()}}
                                    <label for="exampleInputEmail1">Tìm kiếm sách và thêm</label>
                                    <input type="text" name ="book_name" class="form-control" style ="width: 500px;" id="exampleInputEmail1" placeholder="Nhập tên sách" value="{{$book_keyword}}" required="">
                                     <button type="submit" class="btn btn-info" style="float: right; margin-top: -34px; margin-right: 580px; padding: 5px 50px 5px 50px;"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>

                      
        </div>

      <div class="col-sm-12">
        @yield('book_content')

  </div>
</div>
</div>


  <div class="panel panel-default">
    <div class="panel-heading">
      <b>SÁCH BÁN CHẠY</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
         <i class="fa fa-tasks" aria-hidden="true"></i>
         <label>Liệt kê tất cả sách bán chạy:</label>               
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

            <th style="width: 100px;">Top</th>
            <th>Tên sách</th>
            <th>Hình ảnh</th>
            <th>Tác giả</th>
          </tr>
        </thead>
        <tbody>
          @foreach($selling as $key => $book)
          <tr>

            <td>Top {{$book->tag_note}}</td>
            <td>{{$book->book_name}}</td>
            <td><img src ="public/upload/book/{{$book->book_image}}" height = "100" width = "80" ></td>
            <td>{{$book->author}}</td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>


  </div>

@endsection