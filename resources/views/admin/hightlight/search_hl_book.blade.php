@extends('admin.hightlight.hl_book')
@section('book_content')
    <br>
    <label style="tex-align: center;"><i class="fa fa-search" aria-hidden="true" style="margin-right: 5px;"></i>Kết quả tìm kiếm</label>
    <a href="{{URL::to('/hl-book')}}" class="icon" ui-toggle-class="" style="float: right; margin: 0px 10px 0px 0px; padding: 2px 20px 2px 20px; border-radius: 5px; font-size: 10px; border: none; background: #2bc88e; color: #fff;"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <div class="table-responsive" style="margin-top: 10px;">
      <table class="table table-striped b-t b-light">
       
        <thead>
          <tr>
            <th>Tên tác phẩm</th>
            <th>Hình ảnh</th>
             <th>Tác giả</th>
            <th>Chọn</th>
          </tr>
        </thead>
        <tbody>
          @foreach($search_hl_book as $key => $value)
          <tr>
          <td>{{$value->book_name}}</td>
          <td><img src ="public/upload/book/{{$value->book_image}}" height = "100" width = "80" ></td>
          <td>{{$value->author}}</td>
          <td><span class = "text-ellipsis">
              <a href="{{URL::to('/active-hl-book/'.$value->book_id)}}" class="active" ui-toggle-class="">Thêm</a>
            </span>
          </td>
        </tr>
          @endforeach
        </tbody>
      </table></div>
      
@endsection