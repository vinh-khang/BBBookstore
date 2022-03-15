@extends('admin.author.all_author')
@section('list_content')

    <div class="table-responsive"> 
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
          @foreach($all_author as $key => $auth)
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