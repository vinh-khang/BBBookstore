@extends('admin_layout')
@section('admin_content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <b>Thông tin cửa hàng sách b&b</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
         <i class="fa fa-list" aria-hidden="true"></i>
         <label>Liệt kê tất cả các thông tin chung của cửa hàng</label>    
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
    @foreach($info as $key => $value)
    <form action="{{URL::to('/update-company-info/'.$value->company_info_id)}}" method="POST">
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
            <td>Tên công ty</td>
            <td><input type="text" name="na" placeholder="Nhập Email" required="" value="{{$value->company_name}}" style=" width: 500px;"/></td>
            <td>
    
            </td>
          </tr>
            <tr>
            <td></td>
            <td>Mã thuế</td>
            <td><input type="text" name="tax" placeholder="Nhập mã thuế" required="" value="{{$value->company_tax}}" style=" width: 500px;"/></td>
            <td>

            </td>
          </tr>

           <tr>
            <td></td>
            <td>Địa chỉ</td>
            <td><input type="text" name="ad" placeholder="Nhập Email" required="" value="{{$value->company_address}}" style=" width: 500px;"/></td>
            <td>

            </td>
          </tr>

           <tr>
            <td></td>
            <td>Số điện thoại</td>
            <td><input type="text" name="ph" placeholder="Nhập Email" required="" value="{{$value->company_phone}}" style=" width: 500px;"/></td>
            <td>

            </td>
          </tr>

          @endforeach
              
        </tbody>
      </table>
      <button type="submit" class="btn btn-info" style="float: left;  margin-left: 590px; padding: 5px 50px 5px 50px;">Cập nhật</button> 
    </div>
  </form>
    <footer class="panel-footer">

    </footer>
  </div>
@endsection