<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{   //Admin Function
      public function AuthLogin(){
        $admin = session::get('admin_id');
        if($admin){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }

    }


    public function add_category_product(){
        $this->AuthLogin();
    	return view('admin.add_category_product');

    }

     public function all_category_product(){
        $this->AuthLogin();
     	$all_category_product = DB::table('tbl_category_product')->get();
     	$manage_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
     	return view('admin_layout')->with('admin.all_category_product',$manage_category_product);

    }

    public function save_category_product(Request $request){
        $this->AuthLogin();
     	$data = array();
     	$data['category_name'] = $request->category_product_name;
     	$data['category_desc'] = $request->category_product_desc;
     	$data['category_status'] = $request->category_product_status;

     	DB::table('tbl_category_product')->insert($data);
     	Session::put('message','Thêm danh mục sản phẩm thành công!');
     	return Redirect::to('add-category-product');
}

	public function unactive_category_product($category_product_id){
        $this->AuthLogin();
		DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
		Session::put('message','Hủy kích hoạt!');
		return Redirect::to('all-category-product');

	}

	public function active_category_product($category_product_id){
        $this->AuthLogin();
		DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
		Session::put('message','Kích hoạt thành công!');
		return Redirect::to('all-category-product');

	}

	public function edit_category_product($category_product_id){
        $this->AuthLogin();
		$edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
     	$manage_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);

     	return view('admin_layout')->with('admin.edit_category_product',$manage_category_product);

	}

	public function update_category_product(Request $request, $category_product_id){
        $this->AuthLogin();
		$data = array();
		$data['category_name'] = $request->category_product_name;
     	$data['category_desc'] = $request->category_product_desc;
     	DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
     	Session::put('message','Cập nhật danh mục thành công!');
     	return Redirect::to('all-category-product');
	}

	public function delete_category_product($category_product_id){
        $this->AuthLogin();

        $book = DB::table('tbl_book')->where('category_id',$category_product_id)->limit(1)->get();

        $book_id = 0;
        foreach($book as $key => $b){
            $book_id = $b->book_id;
        }

        if($book_id == 0){
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
            Session::put('message','Xóa danh mục sản phẩm thành công!');
            return Redirect::to('all-category-product');
       
        }else{  
             Session::put('message','Không thể xóa danh mục tác phẩm! (Danh mục chưa trống)');
             return Redirect::to('all-category-product');  
		}

	}

    //Client Function
    public function show_category_home($category_id){
        $keyword ='';
        $cate = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','asc')->get();
        $pub = DB::table('tbl_publisher')->where('publisher_status','0')->orderby('publisher_id','asc')->get();
        $contact =  DB::table('tbl_company_info')->get();
        $category_by_id =DB::table('tbl_book')->join('tbl_category_product','tbl_book.category_id','=','tbl_category_product.category_id')->where('tbl_book.category_id',$category_id)->wherenotin('book_id',[0])->orderby('book_id','desc')->paginate(28);

        $category_name = DB::table('tbl_category_product')->where('category_id',$category_id)->limit(1)->get();

        return view('pages.category.show_category')->with('category',$cate)->with('publisher',$pub)->with('category_by_id', $category_by_id)->with('category_name',$category_name)->with('keyword',$keyword)->with('contact',$contact);

        
    }


    





}
