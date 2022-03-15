@extends('admin.author.all_author')
@section('search_content')

    <div class="table-responsive"> 
        <div class="container-4"> 
        <label style="margin-left: 20px;"><i class="fa fa-search" aria-hidden="true" style="margin-right: 5px;"></i>Kết quả tìm kiếm</label>
        
         <a href="{{URL::to('/all-author')}}" class="icon" ui-toggle-class="" style="float: right; margin: 0px 10px 0px 0px; padding: 2px 20px 2px 20px; border-radius: 5px; font-size: 10px; border: none; background: #2bc88e; color: #fff;"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
      </div>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;"></th>
            <th>Tên Tác giả</th>
            <th>Hình ảnh</th>
            <th>Tác phẩm</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($a as $key => $auth)
          <tr>
            <td></td>
            <td>{{$auth->author_name}}</td>
            <td> <img src ="public/upload/author/{{$auth->author_image}}" height = "100" width = "100"></td>
            <td><span class = "text-ellipsis">
              <a href="{{URL::to('/show-book-author/'.$auth->author_id)}}">Xem các tác phẩm</a>
            </span></td>
            <td><span class = "text-ellipsis">
              <?php
              if($auth->author_status == 0){
              ?>
              <a href="{{URL::to('/unactive-author/'.$auth->author_id)}}"><span class ="fa fa-thumbs-up" style="color: green;"></pan></a>
              <?php
              }else{
              ?>
               <a href="{{URL::to('/active-author/'.$auth->author_id)}}"><span class ="fa fa-thumbs-down" style="color: red;"></pan></a>
              <?php
              }
              ?>

            </span></td>
             <td>
              <a href="{{URL::to('/edit-author/'.$auth->author_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o"></i></a>
              <a onclick=" return confirm('Bạn có muốn xóa tác giả này không?')" href="{{URL::to('/delete-author/'.$auth->author_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
      
@endsection