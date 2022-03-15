@extends('admin.author.add_book_author')
@section('author_content')
    <br>
    <form action ="{{URL::to('/update-book-author/')}}" method="POST" style="">
      {{csrf_field()}}
    <label style="tex-align: center;"><i class="fa fa-search" aria-hidden="true" style="margin-right: 5px;"></i>Kết quả liệt kê</label>
    <button type="submit" name ="update_book_author" class="btn btn-info" style="float: right; margin-right: 20px; padding: 5px 50px 5px 50px;"><i class="fa fa-plus" aria-hidden="true"></i></button> 

    <br>
    <div class="col-sm-5" style="margin-top: 13px;">
    <div class="table-responsive" style=" width: 80%;">
      <table class="table table-striped b-t b-light">
       
        <thead>
          <tr>
            <th>Tên tác giả</th>
            <th style="width: 30px;">Chọn</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($a as $key => $value)
          <tr>
          <td>{{$value->author_name}}</td>
          <td>
          <input type="radio" name="author_id" value="{{$value->author_id}}" required="" style="margin-left: 15px;"/>
          </td>
        </tr>
          @endforeach
        </tbody>
      </table></div></div>

      <div class="col-sm-7">
      <div class="table-responsive"style="" >
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên tác phẩm</th>
            <th style="width: 30px;">Chọn</th>
          </tr>
        </thead>
        <tbody>
          @foreach($b as $key => $value)
          <tr>
          <td>{{$value->book_name}}</td>
          <td>
          <input type="radio" name="book_id" value="{{$value->book_id}}" required="" style="margin-left: 15px;"/>
          <span class = "text-ellipsis" style="float: right;">
              <?php
              if($value->author_id == 0){
              ?>
              <span></span>
              <?php
              }else{
              ?>
               <span class ="" style="color: red;">*</pan>
              <?php
              }
              ?>

            </span>
          </td>
        </tr>
          @endforeach
        </tbody>
      </table>
    </div></div><span style="padding: 20px; float: right;">(<span style="color: red;">*</span>): Tác phẩm đã liên kết với tác giả</span>
      </form>
@endsection