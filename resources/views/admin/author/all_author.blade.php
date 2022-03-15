@extends('admin_layout')
@section('admin_content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <b>Liệt kê Tác giả</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
           <form action ="{{URL::to('/search-author')}}" method="POST" style="">
                            {{csrf_field()}}   
                                    <input type="text" name ="author_name" class="form-control" style ="width: 300px; border-radius: 20px; float: left;" id="exampleInputEmail1" placeholder="Nhập tên tác giả" value="{{$author_keyword}}" required="">

                                     <button type="submit" class="icon" style="float: left; margin: 0px 0px 0px 10px; padding: 6px 10px 6px 10px; border-radius: 20px; font-size: 10px; border: none; background: #00adee; color: #fff;"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>                 
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
      @yield('search_content')
      @yield('list_content')
    </div>
  </div>

@endsection