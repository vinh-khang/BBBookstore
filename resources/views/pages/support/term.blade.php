@extends('pages.support.support')
@section('support_content')

<section>
        
                     @foreach($term as $key => $value)
                    <div class="blog-post-area" style ="margin-top: 10px;  padding: 10px 10px 20px 10px;">
                        <h2 class="title text-center" style="color: #428bca; margin-bottom: 10px;">{{$value->news_title}}</h2>  
                       	
                            {!!$value->news_content!!}                       
                        @endforeach
                       </div>                  
                    
 @endsection