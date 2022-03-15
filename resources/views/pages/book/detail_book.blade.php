@extends('pages.book.bookcase')
@section('case_content')

@foreach($detail_book as $key => $value)
<div class="product-details" style="background: #fff; padding: 15px; margin: 0px 0px 10px 0px; border-radius: 5px; "><!--product-details-->
						<div class="col-sm-5" >
							<div class="view-product">
								<img src="{{URL::to('/public/upload/book/'.$value->book_image)}}" alt="" style ="margin-left: 20px;  width: 290px; box-shadow: 0px 0px 2px #cbcbcb;">
							<!-- 	<h3>ZOOM</h3> -->
							</div>
	
						</div>
						<div class="col-sm-7" >
							<div class="book-information" style="padding-bottom: 20px;"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								
								<h4 style="text-transform: uppercase; color: #666; margin-top: 10px; line-height: 1.3;"><b>{{$value->book_name}}</b></h4>
								<p>Book ID: {{$value->book_id}}</p>
								<br>
								<img src="images/product-details/rating.png" alt="" />
									<span class="price-k">{{number_format($value->book_price).' '.'₫'}}</span>
									
								
								<form action="{{URL::to('/add-cart')}}" method="POST">	
									{{csrf_field()}}
									<div>
									<?php
                                            $customer_id = Session::get('customer_id');
                                                        if($customer_id){
                                    ?>
                                	<input type="hidden" name="customer_id" value="{{$customer_id}}">

                                	<?php
                                     }
                                     ?>
                                    <input type="hidden" name="book_id" value="{{$value->book_id}}">
                                    <input type="hidden" name="category_id" value="{{$value->category_id}}">
                                    <label>Số lượng:</label>
                                    <input type="number" name="qty" min = "1" value="1" style="width: 100px;"/>					

									<button type="submit" class="btn btn-fefault cart add-to-cart" name="add_to_cart" 
									>
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ
									</button>
								</div>
								</form>
								<br>
								<p><b>Tác giả:</b> {{$value->author}}</p>
								<p><b>Thể loại:</b> <a href ="{{URL::to('/danh-muc-sach/'.$value->category_id)}}">{{$value->category_name}}</a></p>
								<p><b>Nhà phát hành:</b> <a href ="{{URL::to('/nha-phat-hanh/'.$value->publisher_id)}}">{{$value->publisher_name}}</a></p>
								<p><b>Năm XB:</b> {{$value->publishing_year}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div>

					<div class="category-tab shop-details-tab" style="background: #fff;  border-radius: 5px; padding-top: 10px; margin: 10px 0px 10px 0px;"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#desc" data-toggle="tab">Mô tả</a></li>
								<li><a href="#detail" data-toggle="tab">Chi tiết</a></li>
							</ul>
						</div>
						<div class="tab-content" style="padding: 25px;">
							<div class="tab-pane fade active in" id="desc" >
								<p><b>{{$value->book_name}}</b></p>									
								<p><b></b> {!! $value->book_desc !!}</p>
								
							</div>
							
							<div class="tab-pane fade" id="detail">
								<div class="col-sm-12"  style="padding-bottom: 20px;">
								<p><b>{{$value->book_name}}</b></p>
								<p><b>Tác giả:</b> {{$value->author}}</p>
								<p><b>Thể loại:</b> {{$value->category_name}}</p>
								<p><b>Nhà phát hành:</b> {{$value->publisher_name}}</p>
								<p><b>Năm XB:</b> {{$value->publishing_year}}</p>
								<p><b>Kích thước:</b> {{$value->book_size}}</p>
								<p><b>Số trang:</b> {{$value->page}}</p>
								<p><b>Nhà xuất bản:</b> {{$value->pub_house}}</p>
								</div>
							</div>
							
						</div>
					</div>
@endforeach
					<div class="recommended_items" style="background: #fff; border-radius: 5px; padding-top: 10px; margin-bottom: 10px;"><!--recommended_items-->
						<h2 class="title text-center">SÁCH LIÊN QUAN</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								@foreach($relate1 as $key => $k1)
                                <a href ="{{URL::to('chi-tiet-sach/'.$k1->book_id)}}">	
								 <div class="col-sm-4" style="width: 25%; height: 370px;">
                                    <div class="product-image-wrapper">
                                        <div class="single-products" style ="height: 350px;">
                                                <div class="productinfo text-center">
                                                    <img src="{{URL::to('/public/upload/book/'.$k1->book_image)}}" alt="" height =200 >
                                                     <p>{{$k1->book_name}}</p>
                                                      <p style ="opacity: 0.7;">{{$k1->author}}</p>
                                                    <h2  style ="margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left; color: #428bca;">{{number_format($k1->book_price).' '.'₫'}}</h2>
                                                   
                                          
                                                </div>

                                        </div>
                                    
                                    </div>
                                </div></a>
								@endforeach	
									
								</div>
								<div class="item">
								@foreach($relate2 as $key => $k2)	
								<a href ="{{URL::to('chi-tiet-sach/'.$k2->book_id)}}">  
                                 <div class="col-sm-4" style="width: 25%; height: 370px;">
                                    <div class="product-image-wrapper">
                                        <div class="single-products" style ="height: 350px;">
                                                <div class="productinfo text-center">
                                                    <img src="{{URL::to('/public/upload/book/'.$k2->book_image)}}" alt="" height =200 >
                                                     <p>{{$k2->book_name}}</p>
                                                      <p style ="opacity: 0.7;">{{$k2->author}}</p>
                                                    <h2  style ="margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;color: #428bca;">{{number_format($k2->book_price).' '.'₫'}}</h2>
                                                   
                                          
                                                </div>

                                        </div>
                                    
                                    </div>
                                </div></a>
								@endforeach	
									
								</div>

							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
 </div>
            </div>
        </div>
    </section>
    
@endsection