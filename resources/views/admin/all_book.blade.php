@extends('admin_layout')
@section('admin_content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <b>Liệt kê thông tin sách</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">

          <form action ="{{URL::to('/search-book/')}}" method="POST" style="">
                            {{csrf_field()}}   
                                    <input type="text" name ="book_name" class="form-control" style ="float: left; width: 300px; border-radius: 20px;" id="exampleInputEmail1" placeholder="Nhập tên sách" value="{{$book_keyword}}" required="">

                                     <button type="submit" class="icon" style="float: left; margin: 0px 0px 0px 10px; padding: 6px 10px 6px 10px; border-radius: 20px; font-size: 10px; border: none; background: #00adee; color: #fff;"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>            
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

      @yield('search_content')
      @yield('list_content')
    

@endsection