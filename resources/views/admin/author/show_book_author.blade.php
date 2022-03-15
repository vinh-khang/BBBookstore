@extends('admin_layout')
@section('admin_content')

  <div class="panel panel-default">
    <div class="panel-heading">
      @foreach($author as $key => $a)
      <b>Các tác phẩm của tác giả {{$a->author_name}}</b>
      
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
          <i class="fa fa-list" aria-hidden="true"></i>
         <label>Tác giả: {{$a->author_name}}</label>               
      </div>
      @endforeach
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

            <th>Tên sách</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Tác giả</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($book as $key => $book)
          <tr>
            <td>{{$book->book_name}}</td>
            <td><img src ="../public/upload/book/{{$book->book_image}}" height = "100" width = "80" ></td>
            <td>{{$book->book_price}}</td>
            <td>{{$book->category_name}}</td>
            <td>{{$book->publisher_name}}</td>
            <td>{{$book->author}}</td>
            <td>
              <a onclick=" return confirm('Bạn có muốn xóa sách khỏi tác giả này không?')" href="{{URL::to('/delete-book-author/'.$book->book_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection