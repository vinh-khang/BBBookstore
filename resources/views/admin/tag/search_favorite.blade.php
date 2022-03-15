@extends('admin.tag.favorite')
@section('book_content')
    <br>
    <label style="tex-align: center;"><i class="fa fa-search" aria-hidden="true" style="margin-right: 5px;"></i>Kết quả tìm kiếm</label>
    <a href="{{URL::to('/favorite')}}" class="icon" ui-toggle-class="" style="float: right; margin: 0px 10px 0px 0px; padding: 2px 20px 2px 20px; border-radius: 5px; font-size: 10px; border: none; background: #2bc88e; color: #fff;"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <div class="table-responsive" style="margin-top: 10px;">
      <table class="table table-striped b-t b-light">
       
        <thead>
          <tr>
            <th>ID sách</th>
            <th>Tên sách</th>
            <th>Hình ảnh</th>
            <th>Yêu thích</th>
          </tr>
        </thead>
        <tbody>
          @foreach($b as $key => $value)
          <tr>
          <td>{{$value->book_id}}</td>
          <td>{{$value->book_name}}</td>
          <td><img src ="public/upload/book/{{$value->book_image}}" height = "100" width = "80" ></td>
          <td><span class = "text-ellipsis">
              <?php
              $added = 0;
            foreach($favorite as $key => $value2){
              if($value2->tag_item_id == $value->book_id){
                $added = 1;
              }
            }
              if($added == 0){
              ?>
              <a href="{{URL::to('/add-favorite/'.$value->book_id)}}" class="active" ui-toggle-class="">Thêm</a>
              <?php
              }else{
              ?>
               <span class ="" style="color: red;">Đã thêm</pan>
              <?php
              }
                          ?>

            </span>
          </td>
        </tr>
          @endforeach
        </tbody>
      </table></div>
      
@endsection