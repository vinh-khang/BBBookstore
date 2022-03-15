<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class Publisher extends Controller
{   
    public function AuthLogin(){
        $admin = session::get('admin_id');
        if($admin){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }

    }


    public function add_publisher(){
        $this->AuthLogin();
    	return view('admin.add_publisher');

    }

     public function all_publisher(){
        $this->AuthLogin();
     	$all_publisher = DB::table('tbl_publisher')->get();
     	$manage_publisher = view('admin.all_publisher')->with('all_publisher',$all_publisher);
     	return view('admin_layout')->with('admin.publisher',$manage_publisher);

    }

    public function save_publisher(Request $request){
        $this->AuthLogin();
     	$data = array();
     	$data['publisher_name'] = $request->publisher_name;
     	$data['publisher_desc'] = $request->publisher_desc;
     	$data['publisher_status'] = $request->publisher_status;

     	DB::table('tbl_publisher')->insert($data);
     	Session::put('message','Thêm Nhà phát hành thành công!');
     	return Redirect::to('add-publisher');
}

	public function unactive_publisher($publisher_id){
        $this->AuthLogin();
		DB::table('tbl_publisher')->where('publisher_id',$publisher_id)->update(['publisher_status'=>1]);
		Session::put('message','Hủy kích hoạt!');
		return Redirect::to('all-publisher');

	}

	public function active_publisher($publisher_id){
        $this->AuthLogin();
		DB::table('tbl_publisher')->where('publisher_id',$publisher_id)->update(['publisher_status'=>0]);
		Session::put('message','Kích hoạt thành công!');
		return Redirect::to('all-publisher');

	}

	public function edit_publisher($publisher_id){
        $this->AuthLogin();
		$edit_publisher = DB::table('tbl_publisher')->where('publisher_id',$publisher_id)->get();
     	$manage_publisher = view('admin.edit_publisher')->with('edit_publisher',$edit_publisher);

     	return view('admin_layout')->with('admin.edit_publisher',$manage_publisher);

	}

	public function update_publisher(Request $request, $publisher_id){
        $this->AuthLogin();
		$data = array();
		$data['publisher_name'] = $request->publisher_name;
     	$data['publisher_desc'] = $request->publisher_desc;
     	DB::table('tbl_publisher')->where('publisher_id',$publisher_id)->update($data);
     	Session::put('message','Cập nhật Nhà phát hành thành công!');
     	return Redirect::to('all-publisher');
	}

	public function delete_publisher($publisher_id){
        $this->AuthLogin();
        $book = DB::table('tbl_book')->where('publisher_id',$publisher_id)->limit(1)->get();

        $book_id = 0;
        foreach($book as $key => $b){
            $book_id = $b->book_id;
        }

        if($book_id == 0){
		    DB::table('tbl_publisher')->where('publisher_id',$publisher_id)->delete();
     	    Session::put('message','Xóa Nhà phát hành thành công!');
     	return Redirect::to('all-publisher');}
        else{
            Session::put('message','Không thể xóa NPH tác phẩm! (NPH chưa trống)');
            return Redirect::to('all-publisher');
        }

	}
        public function show_publisher_home($publisher_id){
        $keyword ='';
        $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
        $pub = DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','asc')->get();
         $contact =  DB::table('tbl_company_info')->get();

        $publisher_by_id =DB::table('tbl_book')->join('tbl_publisher','tbl_book.publisher_id','=','tbl_publisher.publisher_id')->where('tbl_book.publisher_id',$publisher_id)->wherenotin('book_id',[0])->paginate(28);

        $publisher_name = DB::table('tbl_publisher')->where('publisher_id',$publisher_id)->limit(1)->get();
        return view('pages.publisher.show_publisher')->with('category',$cate)->with('publisher',$pub)->with('publisher_by_id', $publisher_by_id)->with('publisher_name',$publisher_name)->with('keyword',$keyword)->with('contact',$contact);
        
    }

//
}
