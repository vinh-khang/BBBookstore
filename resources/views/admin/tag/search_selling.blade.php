@extends('admin.tag.selling')
@section('book_content')
    <br>
    <form action ="{{URL::to('/add-selling/')}}" method="POST" style="">
      {{csrf_field()}}
    <label style="tex-align: center;"><i class="fa fa-search" aria-hidden="true" style="margin-right: 5px;"></i>Kết quả liệt kê</label>

    <button type="submit" name ="update_book_author" class="btn btn-info" style="float: right; margin-right: 20px; padding: 5px 50px 5px 50px;"><i class="fa fa-plus" aria-hidden="true"></i></button> 

     <select name="selling_top" style="float: right; margin-right: 20px; padding: 5px 5px 7px 5px; border-radius: 5px; border-color: #00adee;">
      <option value="0" selected>-- Chọn top --</option>
      <option value="1">Top 1</option>
      <option value="2">Top 2</option>
      <option value="3">Top 3</option>
      <option value="4">Top 4</option>
      <option value="5">Top 5</option>
      <option value="6">Top 6</option>
      <option value="7">Top 7</option>
      <option value="8">Top 8</option>
    </select>

    <div class="table-responsive" style="margin-top: 15px;">
      <table class="table table-striped b-t b-light">
       
        <thead>
          <tr>
            <th>ID sách</th>
            <th>Tên sách</th>
            <th>Hình ảnh</th>
            <th>Chọn</th>
          </tr>
        </thead>
        <tbody>
          @foreach($b as $key => $value)
          <tr>
          <td>{{$value->book_id}}</td>
          <td>{{$value->book_name}}</td>
          <td><img src ="public/upload/book/{{$value->book_image}}" height = "100" width = "80" ></td>
          <td><input type="radio" name="book_id" value="{{$value->book_id}}" required="" style="margin-left: 15px;"/>
          </td>
        </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </form>
      
@endsection