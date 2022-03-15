<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class BookController extends Controller
{	
	  public function AuthLogin(){
        $admin = session::get('admin_id');
        if($admin){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }

    }

  public function add_book(){
  		$this->AuthLogin();
  		$cate = DB::table('tbl_category_product')->orderby('category_id','asc')->get();
  		$pub = DB::table('tbl_publisher')->orderby('publisher_id','asc')->get();
  		
    	return view('admin.add_book')->with('cate', $cate)->with('pub', $pub);


    }

     public function all_book(){
     	$this->AuthLogin();
        $book_keyword='';

     	$all_book = DB::table('tbl_book')
     	->join('tbl_category_product','tbl_category_product.category_id','=','tbl_book.category_id')
     	->join('tbl_publisher','tbl_publisher.publisher_id','=','tbl_book.publisher_id')
        ->wherenotin('book_id',[0])
     	->orderby('tbl_book.book_id','desc')->paginate(30);
     	$manage_book = view('admin.book.list_book')->with('all_book',$all_book)->with('book_keyword',$book_keyword);
     	return view('admin_layout')->with('admin.book.list_book',$manage_book)->with('book_keyword',$book_keyword); 

    }

     public function all_stock_book(){
        $this->AuthLogin();
        $book_keyword='';

        $all_book = DB::table('tbl_book')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_book.category_id')
        ->join('tbl_publisher','tbl_publisher.publisher_id','=','tbl_book.publisher_id')
        ->wherenotin('book_id',[0])
        ->orderby('tbl_book.book_qty','asc')->orderby('tbl_book.book_id','desc')->paginate(30);
        $manage_book = view('admin.book.list_book')->with('all_book',$all_book)->with('book_keyword',$book_keyword);
        return view('admin_layout')->with('admin.book.list_book',$manage_book)->with('book_keyword',$book_keyword); 

    }

     public function all_desc_stock_book(){
        $this->AuthLogin();
        $book_keyword='';

        $all_book = DB::table('tbl_book')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_book.category_id')
        ->join('tbl_publisher','tbl_publisher.publisher_id','=','tbl_book.publisher_id')
        ->wherenotin('book_id',[0])
        ->orderby('tbl_book.book_qty','desc')->orderby('tbl_book.book_id','desc')->paginate(30);
        $manage_book = view('admin.book.list_book')->with('all_book',$all_book)->with('book_keyword',$book_keyword);
        return view('admin_layout')->with('admin.book.list_book',$manage_book)->with('book_keyword',$book_keyword); 

    }


    public function search_allbook(Request $request){
        $this->AuthLogin();
        $book_keyword=$request->book_name;

        $b =  DB::table('tbl_book')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_book.category_id')
        ->join('tbl_publisher','tbl_publisher.publisher_id','=','tbl_book.publisher_id')
        ->orderby('tbl_book.book_id','desc')->where('book_name','like','%'.$book_keyword.'%')->wherenotin('book_id',[0])->limit(10)->get();
        $contact =  DB::table('tbl_company_info')->get();

        $all_book = DB::table('tbl_book')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_book.category_id')
        ->join('tbl_publisher','tbl_publisher.publisher_id','=','tbl_book.publisher_id')
        ->orderby('tbl_book.book_id','desc')->get();

        return view('admin.book.search_allbook')->with('book_keyword',$book_keyword)->with('b',$b)->with('all_book',$all_book)->with('contact',$contact);
    }

    public function save_book(Request $request){
    	$this->AuthLogin();
     	$data = array();
     	$data['book_name'] = $request->book_name;
     	$data['category_id'] = $request->cate_book;
     	$data['publisher_id'] = $request->pub_book;
     	$data['author'] = $request->author;
        $data['author_id'] = 0;
     	$data['book_desc'] = $request->book_desc;
     	$data['book_price'] = $request->book_price;
     	$data['book_size'] = $request->book_size;
     	$data['page'] = $request->page;
     	$data['pub_house'] = $request->pub_house;
        $data['book_qty'] = $request->book_qty;
     	$data['publishing_year'] = $request->publishing_year;
     	$data['book_status'] = $request->book_status;

     	$get_image =$request->file('book_image');

     	if($get_image){
     		$get_name_image = $get_image->getClientOriginalName();
     		$name_image = current(explode('.',$get_name_image ));
     		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
     		$get_image->move('public/upload/book', $new_image);
     		$data['book_image'] = $new_image;

	     	DB::table('tbl_book')->insert($data);
	     	Session::put('message','Thêm sách thành công!');
	     	return Redirect::to('add-book');
     	}

     	$data['book_image'] = '';
     	DB::table('tbl_book')->insert($data);
     	Session::put('message','Thêm sách thành công!');
     	return Redirect::to('add-book');
}

	public function unactive_book($book_id){
		$this->AuthLogin();
		DB::table('tbl_book')->where('book_id',$book_id)->update(['book_status'=>1]);
		Session::put('message','Hủy kích hoạt!');
		return Redirect::to('all-book');

	}

	public function active_book($book_id){
		$this->AuthLogin();
		DB::table('tbl_book')->where('book_id',$book_id)->update(['book_status'=>0]);
		Session::put('message','Kích hoạt thành công!');
		return Redirect::to('all-book');

	}

	public function edit_book($book_id){
		 $this->AuthLogin();
		$cate = DB::table('tbl_category_product')->orderby('category_id','asc')->get();
  		$pub = DB::table('tbl_publisher')->orderby('publisher_id','asc')->get();

		$edit_book = DB::table('tbl_book')->where('book_id',$book_id)->get();
     	$manage_book = view('admin.edit_book')->with('edit_book',$edit_book)
     	->with('cate',$cate)->with('pub',$pub);

     	return view('admin_layout')->with('admin.edit_book',$manage_book);

	}

	public function update_book(Request $request, $book_id){
		 $this->AuthLogin();
		$data = array();
		$data['book_name'] = $request->book_name;
     	$data['category_id'] = $request->cate_book;
     	$data['publisher_id'] = $request->pub_book;
     	$data['author'] = $request->author;
     	$data['book_desc'] = $request->book_desc;
     	$data['book_price'] = $request->book_price;
     	$data['book_size'] = $request->book_size;
     	$data['page'] = $request->page;
     	$data['pub_house'] = $request->pub_house;
        $data['book_qty'] = $request->book_qty;
     	$data['publishing_year'] = $request->publishing_year;
     	$data['book_status'] = $request->book_status;
     	$get_image = $request->file('book_image');

     	if($get_image){
     		$get_name_image = $get_image->getClientOriginalName();
     		$name_image = current(explode('.',$get_name_image ));
     		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
     		$get_image->move('public/upload/book', $new_image);
     		$data['book_image'] = $new_image;

	     	DB::table('tbl_book')->where('book_id',$book_id)->update($data);
	     	Session::put('message','Cập nhật sách thành công!');
	     	return Redirect::to('all-book');
     	}

     	DB::table('tbl_book')->where('book_id',$book_id)->update($data);
     	Session::put('message','Cập nhật sách thành công!');
     	return Redirect::to('all-book');
	}

	public function delete_book($book_id){
		$this->AuthLogin();
        $hl_book = DB::table('tbl_tag')->where('tag_type',2)->first();
        if($hl_book->tag_item_id == $book_id){
            Session::put('message','Sách nằm trong Điểm sách, không thể xóa!');
            return Redirect::to('all-book');
        }
        $fa_book = DB::table('tbl_tag')->where('tag_type',3)->where('tag_item_id',$book_id)->first();
        if(isset($fa_book)){
            DB::table('tbl_tag')->where('tag_type',3)->where('tag_item_id',$book_id)->delete();
        }

        $sell_book = DB::table('tbl_tag')->where('tag_type',4)->where('tag_item_id',$book_id)->first();
        if(isset($sell_book)){
            $data = array();
            $data['tag_item_id'] = 0;

            DB::table('tbl_tag')->where('tag_type',4)->where('tag_item_id',$book_id)->update($data);
        }


		DB::table('tbl_book')->where('book_id',$book_id)->delete();
     	Session::put('message','Xóa sách thành công!');
     	return Redirect::to('all-book');

	} 
     //Frontend
    public function detail_book($book_id){

        $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
        $pub = DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','asc')->get();
        $contact =  DB::table('tbl_company_info')->get();

        $detail_book = DB::table('tbl_book')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_book.category_id')
        ->join('tbl_publisher','tbl_publisher.publisher_id','=','tbl_book.publisher_id')
        ->where('book_id',$book_id)->get();

        foreach($detail_book as $key => $value){
        $category_id = $value->category_id;}
        $related_book1=null;
        $related_book1 = DB::table('tbl_book')->inRandomOrder()
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_book.category_id') 
        ->where('tbl_category_product.category_id',$category_id)->wherenotin('tbl_book.book_id',[$book_id])->wherenotin('tbl_book.book_id',[0])->limit(4)->get();

        $keyword ='';
  
        $relate_id = array($book_id);
        foreach($related_book1 as $key => $k1){
        $relate_id[] = $k1->book_id;
    }
        $related_book2=null;
        $related_book2 = DB::table('tbl_book')->inRandomOrder()
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_book.category_id')
        ->where('tbl_category_product.category_id',$category_id)->wherenotin('tbl_book.book_id',[$relate_id[0],$relate_id[1],$relate_id[2],$relate_id[3],$relate_id[4]])->wherenotin('tbl_book.book_id',[0])->limit(4)->get();

        return view('pages.book.detail_book')->with('category',$cate)->with('publisher',$pub)->with('detail_book',$detail_book)->with('relate1',$related_book1)->with('relate2',$related_book2)->with('keyword',$keyword)->with('contact',$contact);  

    }


    public function search_book(Request $request){
        $keyword = $request->keyword_submit;

        $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
        $pub = DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','asc')->get();
        $contact =  DB::table('tbl_company_info')->get();
        $search_book =  DB::table('tbl_book')->where('book_name','like','%'.$keyword.'%')->wherenotin('book_id',[0])->get();


        return view('pages.book.search')->with('category',$cate)->with('publisher',$pub)->with('search_book',$search_book)->with('keyword',$keyword)->with('contact',$contact);
    }

     public function update_book_author(Request $request){
        $this->AuthLogin();
        $data = array();
        if(isset($request->author_id) && isset($request->book_id)){
        $data['author_id'] = $request->author_id;
        $book_id = $request->book_id;

        DB::table('tbl_book')->where('book_id',$book_id)->update($data);
        Session::put('message','Cập nhật tác phẩm cho tác giả thành công!');
        return Redirect::to('add-book-author');}
        else{
        Session::put('message','Chưa chọn tác giả hoặc tác phẩm');
        return Redirect::to('add-book-author');   
        }
    }

      public function delete_book_author(Request $request){
        $this->AuthLogin();
        $data = array();
        if(isset($request->book_id)){
        $data['author_id'] = '0';
        $book_id = $request->book_id;

        DB::table('tbl_book')->where('book_id',$book_id)->update($data);
        Session::put('message','Xóa tác phẩm khỏi tác giả thành công!');
        return Redirect::to('all-author');}
        else{
        Session::put('message','Chưa chọn tác giả hoặc tác phẩm');
        return Redirect::to('all-author');   
        }
    }


       public function favorite(){
        $this->AuthLogin();
        $book_keyword='';
        $favorite = DB::table('tbl_tag')
        ->join('tbl_book','tbl_book.book_id','=','tbl_tag.tag_item_id')
        ->where('tag_type',3)
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_book.category_id')
        ->join('tbl_publisher','tbl_publisher.publisher_id','=','tbl_book.publisher_id')
        ->orderby('tbl_book.book_id','desc')->get();

        return view('admin.tag.favorite')->with('favorite',$favorite)->with('book_keyword',$book_keyword);

    }   

    public function search_favorite(Request $request){
        $this->AuthLogin();
        $book_keyword=$request->book_name;

        $b =  DB::table('tbl_book')->where('book_name','like','%'.$book_keyword.'%')->orderby('tbl_book.book_id','desc')->limit(8)->get();

        $favorite = DB::table('tbl_tag')
        ->join('tbl_book','tbl_book.book_id','=','tbl_tag.tag_item_id')
        ->where('tag_type',3)
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_book.category_id')
        ->join('tbl_publisher','tbl_publisher.publisher_id','=','tbl_book.publisher_id')
        ->orderby('tbl_book.book_id','desc')->get();

        return view('admin.tag.search_favorite')->with('book_keyword',$book_keyword)->with('b',$b)->with('favorite',$favorite);
    }
    
    public function add_favorite($book_id){
        $this->AuthLogin();
        $data = array();
        $data['tag_item_id'] = $book_id;
        $data['tag_type'] = 3;

        DB::table('tbl_tag')->insert($data);
        Session::put('message','Thêm sách yêu thích thành công!');
        return Redirect::to('favorite');
    }

    public function delete_favorite($book_id){
        $this->AuthLogin();

        DB::table('tbl_tag')->where('tag_item_id',$book_id)->where('tag_type',3)->delete();
        Session::put('message','Xóa sách yêu thích thành công!');
        return Redirect::to('favorite');
    }

    public function selling(){
        $this->AuthLogin();
        $book_keyword='';
        $selling = DB::table('tbl_tag')
        ->join('tbl_book','tbl_book.book_id','=','tbl_tag.tag_item_id')
        ->where('tag_type',4)
        ->orderby('tag_note','asc')->get();

        return view('admin.tag.selling')->with('selling',$selling)->with('book_keyword',$book_keyword);

    } 


    public function search_selling(Request $request){
        $this->AuthLogin();
        $book_keyword=$request->book_name;

        $b =  DB::table('tbl_book')->where('book_name','like','%'.$book_keyword.'%')->orderby('book_id','desc')->limit(8)->get();

        $selling = DB::table('tbl_tag')
        ->join('tbl_book','tbl_book.book_id','=','tbl_tag.tag_item_id')
        ->where('tag_type',4)
        ->orderby('tag_note','asc')->get();

        return view('admin.tag.search_selling')->with('book_keyword',$book_keyword)->with('b',$b)->with('selling',$selling);
    }

     public function add_selling(Request $request){
        $this->AuthLogin();
        $new_top = $request->selling_top;
        $new_id = $request->book_id;
        if($new_top!=0){

        $data = array();
        $data['tag_item_id'] = $new_id;
        DB::table('tbl_tag')->where('tag_type',4)->where('tag_note',$new_top)->update($data);

        Session::put('message','Thêm sách bán chạy thành công!');
        return Redirect::to('selling');}
        else{
        Session::put('message','Bạn chưa chọn top cho sách bán chạy!');
        return Redirect::to('selling');    
        }
    }

    public function hl_book(Request $request){
        $this->AuthLogin();
        $book_keyword='';

        $hl_book = DB::table('tbl_tag')
        ->join('tbl_book','tbl_book.book_id','=','tbl_tag.tag_item_id')
        ->where('tag_type',2)
        ->limit(1)->get();

        return view('admin.hightlight.hl_book')->with('hl_book',$hl_book)->with('book_keyword',$book_keyword);

    }

    public function search_hl_book(Request $request){
        $this->AuthLogin();
        $book_keyword=$request->book_name;

        $search_hl_book = DB::table('tbl_book')
        ->where('book_name','like','%'.$book_keyword.'%')->orderby('book_id','desc')->limit(8)->get();

        $hl_book = DB::table('tbl_tag')
        ->join('tbl_book','tbl_book.book_id','=','tbl_tag.tag_item_id')
        ->where('tag_type',2)
        ->limit(1)->get();

        return view('admin.hightlight.search_hl_book')->with('book_keyword',$book_keyword)->with('hl_book',$hl_book)->with('search_hl_book',$search_hl_book);
    }

  public function active_hl_book($book_id){
        $this->AuthLogin();
        $data = array();
        $data['tag_item_id'] = $book_id;

        DB::table('tbl_tag')->where('tag_type',2)->update($data);
        Session::put('message','Thêm Điểm sách thành công!');
        return Redirect::to('hl-book');

    }
  
}
