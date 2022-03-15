@extends('admin_layout')
@section('admin_content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <b>Thống kê doanh thu</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
      <i class="fa fa-list" aria-hidden="true"></i>
         <label>Liệt kê danh thu và tổng đơn theo ngày:</label>                
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
            <th>Ngày</th>
            <th>Doanh thu</th>
            <th>Tổng đơn</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($revenue as $key => $value)
          <tr>
            <td></td>
            <td>{{$value->order_date}}</td>
            <td>{{number_format($value->total_sales).' '.'₫'}}</td>
            <td>{{$value->total_order}}</td>
           
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
{{$revenue->links()}}
@endsection