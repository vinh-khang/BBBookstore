
@extends('pages.author.author_frame')
@section('author_content')
<div class="features_items"><!--features_items-->
                         <h2 class="title text-center" style ="padding: 5px; color: #666; text-align: left; border-bottom: 4px solid #00adee;"><i class="fa fa-user" aria-hidden="true" style ="color: #00adee;margin-right: 10px;"></i>TÁC GIẢ</h2>

                          @foreach($author as $key => $auth)
                        <a href ="{{URL::to('chi-tiet-tac-gia/'.$auth->author_id)}}">
                        <div class="col-sm-4" style="width: 25%; height: 250px; ">
                            <div class="product-image-wrapper" style="border: none;">
                                <div class="single-products" style ="height: 250px;">
                                        <div class="productinfo text-center">
                                            
                                            
                                            <img src="{{URL::to('/public/upload/author/'.$auth->author_image)}}" alt="" height =180  style ="border-radius: 180px; padding: 10px; background: #fff; width: 100%; height: 180px; width: 180px; box-shadow: 0px 0px 2px #cbcbcb;">
                                             <p style="text-align: center; font-size: 18px; " >{{$auth->author_name}}</p>
                                             

                                        </div>

                                </div>
                            </div>
                        </div></a>

                        @endforeach


                        
                        
                    </div>
                    {{$author->links()}}
 @endsection