@extends('admin_layout')
@section('admin_content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <b>Liệt kê banner</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <i class="fa fa-list" aria-hidden="true"></i>
         <label>Liệt kê tất cả Banner:</label>               
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
            <th>Tên </th>
            <th>Mô tả</th>
            <th>Hiển thị</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
           
          @foreach($all_banner as $key => $banner)
          <tr>
            <td></td>
            

            <td>
              <img src ="public/upload/banner/{{$banner->banner_image}}" height = "100" >          
            </td>
            <td>{{$banner->banner_name}}</td>
            <td>{{$banner->banner_desc}}</td>
            <td><span class = "text-ellipsis">
              <?php
              if($banner->banner_status == 0){
              ?>
              <a href="{{URL::to('/unactive-banner/'.$banner->id)}}"><span class ="fa fa-thumbs-up" style="color: green;"></pan></a>
              <?php
              }else{
              ?>
               <a href="{{URL::to('/active-banner/'.$banner->id)}}"><span class ="fa fa-thumbs-down" style="color: red;"></pan></a>
              <?php
              }
              ?>

            </span></td>
            <td>
              <a href="{{URL::to('/edit-banner/'.$banner->id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o"></i></a>
              <a onclick=" return confirm('Bạn có muốn xóa banner này không?')" href="{{URL::to('/delete-banner/'.$banner->id)}}" class="active" ui-toggle-class="">
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