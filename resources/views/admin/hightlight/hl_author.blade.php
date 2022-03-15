@extends('admin_layout')
@section('admin_content')
 <div class="panel panel-default" style="padding-bottom: 10px;">  
    <div class="panel-heading">
      <b>THÊM TÁC GIẢ NỔI BẬT</b>
    </div>
    <div class="row w3-res-tb">
        <div class="col-sm-12" >
                         <form action ="{{URL::to('/search-hl-author/')}}" method="POST" style="">
                            {{csrf_field()}}
                                    <label for="exampleInputEmail1">Tìm kiếm tên tác giả và thêm</label>
                                    <input type="text" name ="author_name" class="form-control" style ="width: 500px;" id="exampleInputEmail1" placeholder="Nhập tên tác giả" value="{{$author_keyword}}" required="">
                                    <button type="submit" class="btn btn-info" style="float: left; margin-top: -34px; margin-left: 520px; padding: 5px 50px 5px 50px;"><i class="fa fa-search" aria-hidden="true"></i></button>  
                        </form>

                      
        </div>

      <div class="col-sm-12">
        @yield('auth_content')

  </div>
</div></div>


  <div class="panel panel-default">
    <div class="panel-heading">
      <b>TÁC GIẢ NỔI BẬT</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
         <i class="fa fa-tasks" aria-hidden="true"></i>
         <label>Thông tin về tác giả nổi bật:</label>               
      </div>
      <div class="col-sm-7">
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
            <th>Tên</th>
            <th>Hình ảnh</th>
            <th>Tiểu sử</th>
            <th style="width:20px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($hl_auth as $key => $author)
          <tr>
            <td></td>
            <td>{{$author->author_name}}</td>
            <td><img src ="public/upload/author/{{$author->author_image}}" height = "100" width = "100" ></td>
            <td style="width:700px;"><span style="display: -webkit-box; -webkit-box-orient: vertical;
                             -webkit-line-clamp: 5; overflow: hidden; margin-bottom: 10px;">{!!$author->author_biography!!}</span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>


  </div>

@endsection