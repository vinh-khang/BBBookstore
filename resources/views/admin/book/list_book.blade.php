@extends('admin.all_book')
@section('list_content')

    <div class="table-responsive">     
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
            </th>
            <th>Tên sách</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th style="width: 120px;">Số lượng </th>
            <th>Danh mục</th>
            
            <th>Tác giả</th>
            <th>H.thị</th>

            <th style="width:20px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_book as $key => $book)
          <tr>
            <td></td>
            <td>{{$book->book_name}}</td>
            <td><img src ="public/upload/book/{{$book->book_image}}" height = "100" width = "80" ></td>
            <td>{{$book->book_price}}</td>
            <td>
              <?php
              if($book->book_qty == 0){
              ?>
              <span style="color: red;">{{$book->book_qty}}</span>
               <?php
              }else{
              if(($book->book_qty > 0) && ($book->book_qty <= 5)){
              ?>
              <span style="color: #f0ad4e;">{{$book->book_qty}}</span>
              <?php
              }else{
                if(($book->book_qty > 5) && ($book->book_qty <= 10)){
              ?>
               <span style="color: #5bc0de;">{{$book->book_qty}}</span>
              <?php
              }else{
                ?>
                <span style="">{{$book->book_qty}}</span>
                <?php
              }}}
              ?>
            </td>
            <td>{{$book->category_name}}</td>
            
            <td>{{$book->author}}</td>
            <td><span class = "text-ellipsis">
              <?php
              if($book->book_status == 0){
              ?>
              <a href="{{URL::to('/unactive-book/'.$book->book_id)}}"><span class ="fa fa-thumbs-up" style="color: green;"></pan></a>
              <?php
              }else{
              ?>
               <a href="{{URL::to('/active-book/'.$book->book_id)}}"><span class ="fa fa-thumbs-down" style="color: red;"></pan></a>
              <?php
              }
              ?>

            </span></td>
            <td>
              <a href="{{URL::to('/edit-book/'.$book->book_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o"></i></a>
              <a onclick=" return confirm('Bạn có muốn xóa sách này không?')" href="{{URL::to('/delete-book/'.$book->book_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>



    <footer class="panel-footer">
      {{$all_book->links()}}
    </footer>
  </div>
</div>
      
@endsection