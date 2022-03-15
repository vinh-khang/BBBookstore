@extends('admin_layout')
@section('admin_content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <b>Liệt kê Nhà phát hành</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
      <i class="fa fa-list" aria-hidden="true"></i>
         <label>Liệt kê tất cả Nhà phát hành:</label>                
      </div>             
      <div class="col-sm-1">
      </div>
      <div class="col-sm-6">
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
            <th>Tên Nhà phát hành</th>
            <th>Hiển thị</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_publisher as $key => $pub)
          <tr>
            <td></td>
            <td>{{$pub->publisher_name}}</td>
            <td><span class = "text-ellipsis">
              <?php
              if($pub->publisher_status == 0){
              ?>
              <a href="{{URL::to('/unactive-publisher/'.$pub->publisher_id)}}"><span class ="fa fa-thumbs-up" style="color: green;"></pan></a>
              <?php
              }else{
              ?>
               <a href="{{URL::to('/active-publisher/'.$pub->publisher_id)}}"><span class ="fa fa-thumbs-down" style="color: red;"></pan></a>
              <?php
              }
              ?>

            </span></td>
            <td>
              <a href="{{URL::to('/edit-publisher/'.$pub->publisher_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o"></i></a>
              <a onclick=" return confirm('Bạn có muốn xóa Nhà phát hành này không?')" href="{{URL::to('/delete-publisher/'.$pub->publisher_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>    

@endsection