@extends('admin_layout')
@section('admin_content')


  <div class="panel panel-default">
    <div class="panel-heading">
      <b>Liệt kê bài viết</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
         <i class="fa fa-list" aria-hidden="true"></i>
         <label>Liệt kê tất cả bài viết</label>    
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
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
            <th>Hình ảnh</th>
            <th>Tiêu đề</th>
            <th>Ngày cập nhật</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
           
          @foreach($all_news as $key => $value)
          <tr>
            <td></td>
           
            <td>
              <img src ="public/upload/news/{{$value->news_image}}" height ="100" >
            </td>
             <td>{{$value->news_title}}</td>
             <td>{{$value->news_date}}</td>
            <td>
              <a href="{{URL::to('/edit-news/'.$value->news_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o"></i></a>
                 <a onclick=" return confirm('Bạn có muốn xóa tin này không?')" href="{{URL::to('/delete-news/'.$value->news_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
              
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">

    </footer>
  </div>


@endsection