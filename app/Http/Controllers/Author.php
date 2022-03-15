<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class Author extends Controller
{
    public function AuthLogin(){
        $admin = session::get('admin_id');
        if($admin){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }

    }

  	public function add_author(){
  		$this->AuthLogin();
    	return view('admin.author.add_author');
    }

     public function all_author(){
     	$this->AuthLogin();
        $author_keyword='';

     	$all_author = DB::table('tbl_author')->wherenotin('author_id',[0])
     	->orderby('tbl_author.author_id','desc')->get();

     	return view('admin.author.list_author')->with('all_author',$all_author)->with('author_keyword',$author_keyword);

    }

    public function save_author(Request $request){
    	$this->AuthLogin();
     	$data = array();
     	$data['author_name'] = $request->author_name;
     	$data['author_biography'] = $request->author_biography;
     	$data['author_status'] = $request->author_status;

     	$get_image =$request->file('author_image');

     	if($get_image){
     		$get_name_image = $get_image->getClientOriginalName();
     		$name_image = current(explode('.',$get_name_image ));
     		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
     		$get_image->move('public/upload/author', $new_image);
     		$data['author_image'] = $new_image;

	     	DB::table('tbl_author')->insert($data);
	     	Session::put('message','Thêm tác giả thành công!');
	     	return Redirect::to('add-author');
     	}

     	$data['author_image'] = '';
     	DB::table('tbl_author')->insert($data);
     	Session::put('message','Thêm tác giả thành công!');
     	return Redirect::to('add-author');
}


	public function unactive_author($author_id){
        $this->AuthLogin();
		DB::table('tbl_author')->where('author_id',$author_id)->update(['author_status'=>1]);
		Session::put('message','Hủy kích hoạt!');
		return Redirect::to('all-author');

	}

	public function active_author($author_id){
        $this->AuthLogin();
		DB::table('tbl_author')->where('author_id',$author_id)->update(['author_status'=>0]);
		Session::put('message','Kích hoạt thành công!');
		return Redirect::to('all-author');

	}

	public function edit_author($author_id){
        $this->AuthLogin();
		$edit_author = DB::table('tbl_author')->where('author_id',$author_id)->get();
  
	   	return view('admin.author.edit_author')->with('edit_author',$edit_author);

	}

	public function update_author(Request $request, $author_id){
        $this->AuthLogin();
		$data = array();
		$data['author_name'] = $request->author_name;
     	$data['author_biography'] = $request->author_biography;
     	$data['author_status'] = $request->author_status;
     	$get_image = $request->file('author_image');

     	if($get_image){
     		$get_name_image = $get_image->getClientOriginalName();
     		$name_image = current(explode('.',$get_name_image ));
     		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
     		$get_image->move('public/upload/author', $new_image);
     		$data['author_image'] = $new_image;

	     	DB::table('tbl_author')->where('author_id',$author_id)->update($data);
	     	Session::put('message','Cập nhật tác giả thành công!');
	     	return Redirect::to('all-author');
     	}

     	DB::table('tbl_author')->where('author_id',$author_id)->update($data);
     	Session::put('message','Cập nhật tác giả thành công!');
     	return Redirect::to('all-author');
	}

	public function delete_author($author_id){
        $this->AuthLogin();

        $book = DB::table('tbl_book')->where('author_id',$author_id)->limit(1)->get();

        $hl_auth = DB::table('tbl_tag')->where('tag_type',1)->first();
        if($hl_auth->tag_item_id == $author_id){
            Session::put('message','Tác giả nằm trong Tác giả nổi bật, không thể xóa!');
            return Redirect::to('all-author');
        }

        $book_id = 0;
        foreach($book as $key => $b){
            $book_id = $b->book_id;
        }

        if($book_id == 0){
            DB::table('tbl_author')->where('author_id',$author_id)->delete();
            Session::put('message','Xóa tác giả thành công!');
            return Redirect::to('all-author');
       
        }else{  
             Session::put('message','Không thể xóa tác giả! (Tác giả chưa trống)');
             return Redirect::to('all-author');  
		}

	}

	public function show_book_author($author_id){
     	$this->AuthLogin();
     	$author = DB::table('tbl_author')
     	->join('tbl_book','tbl_author.author_id','=','tbl_book.author_id')
     	->where('tbl_author.author_id',$author_id)->limit(1)->get();

     	$book = DB::table('tbl_author')
     	->join('tbl_book','tbl_author.author_id','=','tbl_book.author_id')
     	->join('tbl_category_product','tbl_category_product.category_id','=','tbl_book.category_id')
     	->join('tbl_publisher','tbl_publisher.publisher_id','=','tbl_book.publisher_id')
        ->orderby('tbl_book.book_id','desc')
     	->where('tbl_author.author_id',$author_id)->get();

     	return view('admin.author.show_book_author')->with('author',$author)->with('book',$book);

    }

    public function detail_author($author_id){
    	$keyword ='';
        $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
        $pub = DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','asc')->get();
        $contact =  DB::table('tbl_company_info')->get();

        $detail_author = DB::table('tbl_author')
        ->where('tbl_author.author_id',$author_id)->get();

        $author_book = DB::table('tbl_book')
        ->where('author_id',$author_id)->get();

        return view('pages.author.detail_author')->with('category',$cate)->with('publisher',$pub)->with('detail_author',$detail_author)->with('keyword',$keyword)->with('author_book',$author_book)->with('contact',$contact);  

    }

      public function add_book_author(){
  		$this->AuthLogin();
  		$author_keyword='';
  		$book_keyword='';

    	return view('admin.author.add_book_author')->with('author_keyword',$author_keyword)->with('book_keyword',$book_keyword);
    }

     public function search_a_b(Request $request){
  		$this->AuthLogin();
  		$author_keyword=$request->author_name;
  		$book_keyword=$request->book_name;

  		$a =  DB::table('tbl_author')->where('author_name','like','%'.$author_keyword.'%')->limit(10)->orderby('author_id','desc')->get();
  		$b =  DB::table('tbl_book')->where('book_name','like','%'.$book_keyword.'%')->limit(10)->orderby('book_id','desc')->get();

    	return view('admin.author.search_auth')->with('author_keyword',$author_keyword)->with('book_keyword',$book_keyword)->with('a',$a)->with('b',$b);
    }

    public function search_author(Request $request){
        $this->AuthLogin();
        $author_keyword=$request->author_name;

        $a =  DB::table('tbl_author')->orderby('author_id','desc')->where('author_name','like','%'.$author_keyword.'%')->limit(10)->get();

        $all_author = DB::table('tbl_author')
        ->orderby('author_id','desc')->get();

        return view('admin.author.search_author')->with('author_keyword',$author_keyword)->with('a',$a)->with('all_author',$all_author);
    }

    public function hl_auth(Request $request){
        $this->AuthLogin();
        $author_keyword='';

        $author_name=$request->author_keyword;

        $hl_auth = DB::table('tbl_tag')
        ->join('tbl_author','tbl_author.author_id','=','tbl_tag.tag_author_id')
        ->where('tag_type',1)
        ->limit(1)->get();

        return view('admin.hightlight.hl_author')->with('hl_auth',$hl_auth)->with('author_keyword',$author_keyword);

    } 

    public function search_hl_auth(Request $request){
        $this->AuthLogin();
        $author_keyword=$request->author_name;

        $search_hl_auth = DB::table('tbl_author')
        ->where('author_name','like','%'.$author_keyword.'%')->limit(8)->get();

        $hl_auth = DB::table('tbl_tag')
        ->join('tbl_author','tbl_author.author_id','=','tbl_tag.tag_author_id')
        ->where('tag_type',1)
        ->limit(1)->get();

        return view('admin.hightlight.search_hl_auth')->with('author_keyword',$author_keyword)->with('hl_auth',$hl_auth)->with('search_hl_auth',$search_hl_auth);
    }

  public function active_hl_auth($author_id){
        $this->AuthLogin();
        $data = array();
        $data['tag_author_id'] = $author_id;

        DB::table('tbl_tag')->where('tag_type',1)->update($data);
        Session::put('message','Thêm tác giả nổi bật thành công!');
        return Redirect::to('hl-auth');

    }
}
