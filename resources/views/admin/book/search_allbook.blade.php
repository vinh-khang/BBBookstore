@extends('admin.all_book')
@section('search_content')

    <div class="table-responsive"> 
        <div class="container-4"> 
        <label style="margin-left: 20px;"><i class="fa fa-search" aria-hidden="true" style="margin-right: 5px;"></i>Kết quả tìm kiếm</label>
        
        <a href="{{URL::to('/all-book')}}" class="icon" ui-toggle-class="" style="float: right; margin: 0px 10px 0px 0px; padding: 2px 20px 2px 20px; border-radius: 5px; font-size: 10px; border: none; background: #2bc88e; color: #fff;"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>   
      </div>
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
            <th>H.thị</th>

            <th style="width:20px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($b as $key => $book)
          <tr>
            <td></td>
            <td>{{$book->book_name}}</td>
            <td><img src ="public/upload/book/{{$book->book_image}}" height = "100" width = "80" ></td>
            <td>{{$book->book_price}}</td>
            <td>{{$book->category_name}}</td>
            <td>{{$book->publisher_name}}</td>
            <td>{{$book->author}}</td>
            <td><span class = "text-ellipsis">
              <?php
              if($book->book_status == 0){
              ?>
              <a href="{{URL::to('/unactive-book/'.$book->book_id)}}"><span class ="fa fa-thumbs-up" style="color: green;"></pan></a>
              <?php
              }else{
              ?>
               <a href="{{URL::to('/active-book/'.$book->book_id)}}"><span class ="fa fa-thumbs-down" style="color: red;"></pan></a>
              <?php
              }
              ?>

            </span></td>
            <td>
              <a href="{{URL::to('/edit-book/'.$book->book_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o"></i></a>
              <a onclick=" return confirm('Bạn có muốn xóa sách này không?')" href="{{URL::to('/delete-book/'.$book->book_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
      
@endsection