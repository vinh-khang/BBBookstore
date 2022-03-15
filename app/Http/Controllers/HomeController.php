<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
      $keyword ='';
    	$cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
  		$pub = DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','asc')->get();

      //Banner
      $banner1 = DB::table('tbl_banner')->where('banner_status','0')->orderby('id','desc')->limit(1)->get();
      foreach($banner1 as $key => $b1){
          $banner_id = $b1->id;}       
      $banner2 = DB::table('tbl_banner')->where('banner_status','0')->wherenotin('id',[$banner_id])->orderby('id','desc')->limit(3)->get();

      //Sách mới phát hành
  		$new_book = DB::table('tbl_book')->where('book_status','0')->orderby('book_id','desc')->limit(4)->get();

      $new_book_id = array();
      foreach($new_book as $key => $nbi){
          $new_book_id[] = $nbi->book_id;}

      $new_book_2 = DB::table('tbl_book')->where('book_status','0')->wherenotin('book_id',[$new_book_id[0],$new_book_id[1],$new_book_id[2],$new_book_id[3]])->orderby('book_id','desc')->limit(4)->get();

      //Sách yêu thích
      $favorite = DB::table('tbl_tag')
        ->join('tbl_book','tbl_book.book_id','=','tbl_tag.tag_item_id')
        ->where('tag_type',3)->where('book_status','0')
        ->orderby('book_id','desc')->limit(4)->get();

      $favorite_id = array();
      foreach($favorite as $key => $yeu){
          $favorite_id[] = $yeu->book_id;}

      $favorite_2 = DB::table('tbl_tag')
        ->join('tbl_book','tbl_book.book_id','=','tbl_tag.tag_item_id')
        ->where('tag_type',3)->where('book_status','0')
        ->wherenotin('book_id',[$favorite_id[0],$favorite_id[1],$favorite_id[2],$favorite_id[3]])
        ->orderby('book_id','desc')->limit(4)->get();

      //Sách bán chạy
      $selling =DB::table('tbl_tag')
        ->join('tbl_book','tbl_book.book_id','=','tbl_tag.tag_item_id')
        ->where('tag_type',4)->where('book_status','0')
        ->orderby('tag_note','asc')->get();

       //Điểm sách
      $hl_book = DB::table('tbl_tag')
      ->join('tbl_book','tbl_book.book_id','=','tbl_tag.tag_item_id')
      ->where('tbl_tag.tag_type',2)
      ->get();

      foreach($hl_book as $key => $value){
        $hl_id = $value->book_id;
      }

      foreach($hl_book as $key => $value){
        $cate_id = $value->category_id;
      }

      $hl_book2 = DB::table('tbl_book')
      ->wherenotin('tbl_book.book_id',[$hl_id])
      ->where('tbl_book.category_id',$cate_id)
      ->inRandomOrder()->limit(2)->get();

      //Tác giả nổi bật
      $author = DB::table('tbl_tag')
      ->join('tbl_author','tbl_author.author_id','=','tbl_tag.tag_author_id')
      ->where('tbl_tag.tag_type',1)
      ->get();
      foreach($author as $key => $ab){
        $author_id = $ab->author_id;
      }

      $auth_book = DB::table('tbl_author')
      ->join('tbl_book','tbl_author.author_id','=','tbl_book.author_id')
      ->where('tbl_book.author_id',$author_id)
      ->orderby('tbl_author.author_id','desc')->limit(3)->get();

      //Sách theo danh mục
      $vanhoc = DB::table('tbl_book')->where('book_status','0')->where('category_id',5)->orderby('book_id','desc')->limit(4)->get();
      $kinhte = DB::table('tbl_book')->where('book_status','0')->where('category_id',11)->orderby('book_id','desc')->limit(4)->get();
      $tamly = DB::table('tbl_book')->where('book_status','0')->where('category_id',8)->orderby('book_id','desc')->limit(4)->get();
      $khoahoc = DB::table('tbl_book')->where('book_status','0')->where('category_id',6)->orderby('book_id','desc')->limit(4)->get();

      //Tin tức
      $news =  DB::table('tbl_news')->wherenotin('news_type',[0])->orderby('news_id','desc')->limit(8)->get();

      $contact =  DB::table('tbl_company_info')->get();

    	return view('pages.home')->with('category',$cate)->with('publisher',$pub)
      ->with('new_book',$new_book)->with('new_book_2',$new_book_2)
      ->with('favorite',$favorite)->with('favorite_2',$favorite_2)
      ->with('selling',$selling)
      ->with('vanhoc',$vanhoc)->with('kinhte',$kinhte)->with('tamly',$tamly)->with('khoahoc',$khoahoc)
      ->with('banner1',$banner1)->with('banner2',$banner2)
      ->with('author',$author)->with('auth_book',$auth_book)->with('hl_book',$hl_book)->with('hl_book2',$hl_book2)
      ->with('news',$news)->with('contact',$contact)
      ->with('keyword',$keyword);
    }

    public function bookcase_all(Request $request){
      $keyword = $request->keyword_submit;

      $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
      $pub = DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','asc')->get();
      $contact =  DB::table('tbl_company_info')->get();
      $search_book =  DB::table('tbl_book')->wherenotin('book_id',[0])->orderby('book_id','desc')->paginate(28);
     
      return view('pages.book.bookcase_all')->with('category',$cate)->with('publisher',$pub)->with('search_book',$search_book)->with('keyword',$keyword)->with('contact',$contact);
    }

    public function show_favorite(Request $request){
      $keyword = $request->keyword_submit;

      $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
      $pub = DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','desc')->get();
      $contact =  DB::table('tbl_company_info')->get();
      $search_book = DB::table('tbl_tag')
        ->join('tbl_book','tbl_book.book_id','=','tbl_tag.tag_item_id')
        ->where('tag_type',3)->wherenotin('book_id',[0])
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_book.category_id')
        ->join('tbl_publisher','tbl_publisher.publisher_id','=','tbl_book.publisher_id')
        ->orderby('tbl_book.book_id','desc')->paginate(28);
     
      return view('pages.book.show_favorite')->with('category',$cate)->with('publisher',$pub)->with('search_book',$search_book)->with('keyword',$keyword)->with('contact',$contact);
    }


     public function author_all(Request $request){
      $keyword = $request->keyword_submit;

      $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
      $pub = DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','asc')->get();
      $contact =  DB::table('tbl_company_info')->get();
      $author =  DB::table('tbl_author')->where('author_status','0')->wherenotin('author_id',[0])->orderby('author_id','desc')->paginate(28);
     
      return view('pages.author.author_all')->with('category',$cate)->with('publisher',$pub)->with('keyword',$keyword)->with('author',$author)->with('contact',$contact);
    }

    public function intro(){
      $keyword = '';
      $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
      $contact =  DB::table('tbl_company_info')->get();
      $intro =  DB::table('tbl_news')->where('news_id',15)->get();
       return view('pages.intro.intro')->with('keyword',$keyword)->with('intro',$intro)->with('category',$cate)->with('contact',$contact);
    }

    //News
      public function new_news(){
      $keyword = '';

      $keyword = '';
      $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
      $news =  DB::table('tbl_news')->wherenotin('news_type',[0])->orderby('news_id','desc')->paginate(12);
      $contact =  DB::table('tbl_company_info')->get();
      $news_type = DB::table('tbl_news')->where('news_type',0)->limit(1)->get();
       return view('pages.news.news')->with('keyword',$keyword)->with('news',$news)->with('category',$cate)->with('news_type',$news_type)->with('contact',$contact);

    }
      public function news_all(){
      $keyword = '';

      $keyword = '';
      $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
      $news =  DB::table('tbl_news')->where('news_type',1)->orderby('news_id','desc')->paginate(12);
      $contact =  DB::table('tbl_company_info')->get();
      $news_type = DB::table('tbl_news')->where('news_type',1)->limit(1)->get();
       return view('pages.news.news')->with('keyword',$keyword)->with('news',$news)->with('category',$cate)->with('news_type',$news_type)->with('contact',$contact);

    }

     public function book_review(){
      $keyword = '';

      $keyword = '';
      $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
      $news =  DB::table('tbl_news')->where('news_type',2)->orderby('news_id','desc')->paginate(12);
      $news_type = DB::table('tbl_news')->where('news_type',2)->limit(1)->get();
      $contact =  DB::table('tbl_company_info')->get();
       return view('pages.news.news')->with('keyword',$keyword)->with('news',$news)->with('category',$cate)->with('news_type',$news_type)->with('contact',$contact);

    }

     public function notification(){
      $keyword = '';

      $keyword = '';
      $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
      $news =  DB::table('tbl_news')->where('news_type',3)->orderby('news_id','desc')->paginate(12);
      $news_type = DB::table('tbl_news')->where('news_type',3)->limit(1)->get();
      $contact =  DB::table('tbl_company_info')->get();
       return view('pages.news.news')->with('keyword',$keyword)->with('news',$news)->with('category',$cate)->with('news_type',$news_type)->with('contact',$contact);

    }

    public function read_news($news_id){
      $keyword = '';

      $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
      $news =  DB::table('tbl_news')->where('news_id',$news_id)->get();
      $contact =  DB::table('tbl_company_info')->get();
      foreach($news as $key => $value){
        $news_type = $value->news_type;
        break;
      }

      $related =  DB::table('tbl_news')->where('news_type',$news_type)->wherenotin('news_id',[$news_id])->orderby('news_id','desc')->limit(10)->get();
       return view('pages.news.read_news')->with('category',$cate)->with('keyword',$keyword)->with('news',$news)->with('related',$related)->with('contact',$contact);

    }

//Support
    public function term(){
      $keyword = '';

      $keyword = '';
      $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
      $term = DB::table('tbl_news')->where('news_id',16)->get();
      $contact =  DB::table('tbl_company_info')->get();
       return view('pages.support.term')->with('keyword',$keyword)->with('term',$term)->with('category',$cate)->with('contact',$contact);

    }

    public function return_policy(){
      $keyword = '';

      $keyword = '';
      $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
      $term = DB::table('tbl_news')->where('news_id',17)->get();
      $contact =  DB::table('tbl_company_info')->get();
       return view('pages.support.term')->with('keyword',$keyword)->with('term',$term)->with('category',$cate)->with('contact',$contact);

    }
  
     public function security(){
      $keyword = '';

      $keyword = '';
      $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
      $term = DB::table('tbl_news')->where('news_id',18)->get();
      $contact =  DB::table('tbl_company_info')->get();
       return view('pages.support.term')->with('keyword',$keyword)->with('term',$term)->with('category',$cate)->with('contact',$contact);

    }

     public function delivery(){
      $keyword = '';

      $keyword = '';
      $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
      $contact =  DB::table('tbl_company_info')->get();
      $term = DB::table('tbl_news')->where('news_id',19)->get();
       return view('pages.support.term')->with('keyword',$keyword)->with('term',$term)->with('category',$cate)->with('contact',$contact);

    }

    public function question(){
      $keyword = '';

      $keyword = '';
      $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
      $contact =  DB::table('tbl_company_info')->get();
      $term = DB::table('tbl_news')->where('news_id',20)->get();
       return view('pages.support.term')->with('keyword',$keyword)->with('term',$term)->with('category',$cate)->with('contact',$contact);

    }    



}
