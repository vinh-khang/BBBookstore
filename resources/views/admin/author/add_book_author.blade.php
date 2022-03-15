@extends('admin_layout')
@section('admin_content')


  <div class="panel panel-default" >  
    <div class="panel-heading">
      <b>THÊM TÁC PHẨM CHO TÁC GIẢ</b>
    </div>
    <div class="row w3-res-tb" style="padding: 10px 20px 10px 20px;">
        <div class="col-sm-12" style="margin-bottom: 10px;">
                         <form action ="{{URL::to('/tim-kiem-sachtg/')}}" method="POST" style="">
                         <div class="col-sm-5" style="padding-left: 0px;">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                                <label>Tìm kiếm tác giả và tác phẩm qua Tên:</label>
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
                          <br>
   
                            {{csrf_field()}}
                                    <label for="exampleInputEmail1">Tên tác giả</label>
                                    <label for="exampleInputEmail1" style ="float:right; margin-right: 595px;">Tên tác phẩm</label>
                                    <input type="text" name ="author_name" class="form-control" style ="width: 400px;" id="exampleInputEmail1" placeholder="Nhập tên tác giả" value="{{$author_keyword}}" required="">
                                    <i class="fa fa-long-arrow-right" aria-hidden="true" style ="width: 300px; float:right; margin-top: -34px; margin-right: 460px; font-size: 30px;"></i>
                                    <input type="text" name ="book_name" class="form-control" style ="width: 400px; float:right; margin-top: -34px; margin-right: 295px;" id="exampleInputEmail1" placeholder="Nhập tên tác phẩm" value="{{$book_keyword}}" required="">
                            
                                     <button type="submit" name ="search_book_author" class="btn btn-info" style="float: right; margin-top: -36px; margin-right: 20px; padding: 5px 50px 5px 50px;"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>

                      
        </div>

      <div class="col-sm-12">
        @yield('author_content')

  </div>
</div></div>

@endsection