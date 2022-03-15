@extends('pages.book.bookcase')
@section('case_content')

<div class="features_items"><!--features_items-->
                        @foreach($category_name as $key=>$name)
                         <h2 class="title text-center" style ="padding: 5px; color: #666; text-align: left; border-bottom: 4px solid #00adee;"><i class="fa fa-book" aria-hidden="true" style ="color: #00adee;margin-right: 10px;"></i>{{$name->category_name}}</h2>
                        @endforeach

                          @foreach($category_by_id as $key => $book)
                        <a href ="{{URL::to('chi-tiet-sach/'.$book->book_id)}}">
                        <div class="col-sm-4" style="width: 25%; height: 370px;">
                            <div class="product-image-wrapper">
                                <div class="single-products" style ="height: 350px;  background: #fff;">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('/public/upload/book/'.$book->book_image)}}" alt="" height =200 >
                                             <p>{{$book->book_name}}</p>
                                              <p style ="opacity: 0.7;">{{$book->author}}</p>
                                            <h2  style ="margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;">{{number_format($book->book_price).' '.'₫'}}</h2>
                                           
                                  
                                        </div>

                                </div>
                            
                            </div>
                        </div></a>

                        @endforeach


                        
                        
                    </div>
                     {{$category_by_id->links()}}
 @endsection