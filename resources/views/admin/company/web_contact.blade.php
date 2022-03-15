@extends('admin_layout')
@section('admin_content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <b>Liệt kê thông tin liên hệ cửa hàng</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
         <i class="fa fa-list" aria-hidden="true"></i>
         <label>Liệt kê tất cả các thông tin liên hệ về cửa hàng</label>    
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
     @foreach($contact as $key => $value)
    <form action="{{URL::to('/update-web-contact/'.$value->company_info_id)}}" method="POST">
                            {{csrf_field()}}
    <div class="table-responsive" style="padding-bottom: 30px;">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
            </th>
            <th>Thông tin</th>
            <th>Chi tiết</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
           
         
          <tr>
            <td></td>
            <td>Facebook</td>
            <td><input type="text" name="fb" placeholder="Nhập Email" required="" value="{{$value->company_facebook}}" style=" width: 500px;"/></td>
            <td>

            </td>
          </tr>

           <tr>
            <td></td>
            <td>Instagram</td>
            <td><input type="text" name="in" placeholder="Nhập Email" required="" value="{{$value->company_instagram}}" style=" width: 500px;"/></td>
            <td>

            </td>
          </tr>

           <tr>
            <td></td>
            <td>Youtube</td>
            <td><input type="text" name="yt" placeholder="Nhập Email" required="" value="{{$value->company_youtube}}" style=" width: 500px;"/></td>
            <td>

            </td>
          </tr>

            <tr>
            <td></td>
            <td>Hotline</td>
            <td><input type="text" name="hl" placeholder="Nhập Email" required="" value="{{$value->company_hotline}}" style=" width: 500px;"/></td>
            <td>

            </td>
          </tr>

            <tr>
            <td></td>
            <td>Email</td>
            <td><input type="text" name="em" placeholder="Nhập Email" required="" value="{{$value->company_email}}" style=" width: 500px;"/></td>
            <td>

            </td>
          </tr>
          @endforeach
              
        </tbody>

      </table>
      <button type="submit" class="btn btn-info" style="float: left;  margin-left: 560px; padding: 5px 50px 5px 50px;">Cập nhật</button> 
    </div>

  </form>
    <footer class="panel-footer">

    </footer>
  </div>

@endsection