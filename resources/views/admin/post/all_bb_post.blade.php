@extends('admin_layout')
@section('admin_content')


  <div class="panel panel-default">
    <div class="panel-heading">
      <b>Liệt kê bài viết về cửa hàng</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
         <i class="fa fa-list" aria-hidden="true"></i>
         <label>Liệt kê tất cả bài viết về cửa hàng</label>    
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
            <th>STT</th>
            <th>Tiêu đề</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
           <?php 
            $i = 1;
           ?>
          @foreach($all_bb_post as $key => $value)
          <tr>
            <td></td>
            <td>{{$i}}</td>
             <td>{{$value->news_title}}</td>
            <td>
              <a href="{{URL::to('/edit-bb-post/'.$value->news_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o"></i></a>
            </td>
            <?php $i++ ?>
          </tr>
          @endforeach
              
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">

    </footer>
  </div>


@endsection