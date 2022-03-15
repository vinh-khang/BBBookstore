@extends('admin_layout')
@section('admin_content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <b>Liệt kê đơn hàng</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
      <form action="{{URL::to('/update_order_status')}}" method="POST">
            {{csrf_field()}}
          <select name="order_status" style="float: left; margin-right: 20px; padding: 5px; border-radius: 5px; border-color: #00adee;">
              <option value="3" selected>Đang vận chuyển</option>
              <option value="4">Giao hàng thành công</option>
          </select>  
          <button type="submit" name ="add_book" class="btn btn-info" style="float: left; padding: 5px 20px 5px 20px;">Cập nhật</button>
              
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

    <div class="table-responsive" style="margin-top: 0px;">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
            </th>
            <th>Mã đơn</th>
            <th>Khách hàng</th>
            <th>Giá trị</th>
            <th>Trạng thái đơn</th>
            <th>Ngày đặt</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_order as $key => $value)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="order_id[]" value="{{$value->order_id}}"></label></td>
            <td>{{$value->order_id}}</td>
            <td>{{$value->customer_name}}</td>
            <td>{{number_format($value->total_price).' '.'₫'}}</td>
            <?php
                  if($value->order_status == 1){
                ?>
            <td style="color: #ff6a6a;">{{$value->status}}</td>
             <?php
                }
                ?>
            <?php
                  if($value->order_status == 2){
                ?>
            <td style="color: #35c367;">{{$value->status}}</td>
             <?php
                }
                ?>

            <?php
                  if($value->order_status == 3){
                ?>
            <td style="color: #00adee;">{{$value->status}}</td>
             <?php
                }
                ?>

             <?php
                  if($value->order_status == 4){
                ?>
            <td style="">{{$value->status}}</td>
             <?php
                }
                ?>

            <td>
                                 {{$value->order_time}}
            </td>
            <td>
              <a href="{{URL::to('/view-order/'.$value->order_id)}}" class="active" ui-toggle-class="">
               <i class="fa fa-list-alt" aria-hidden="true"></i></a>
              <a onclick=" return confirm('Bạn có muốn xóa đơn hàng này không?')" href="{{URL::to('/delete-order/'.$value->order_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>  
  </div>
  {{$all_order->links()}}
</form>
@endsection