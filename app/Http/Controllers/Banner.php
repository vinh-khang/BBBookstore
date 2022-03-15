<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class Banner extends Controller
{	public function AuthLogin(){
        $admin = session::get('admin_id');
        if($admin){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }

    }

    public function add_banner(){
        $this->AuthLogin();
    	return view('admin.add_banner');

    }
      public function all_banner(){
     	$this->AuthLogin();
     	$all_banner = DB::table('tbl_banner')
     	->orderby('id','desc')->get();

     	$manage_banner = view('admin.all_banner')->with('all_banner',$all_banner);
     	return view('admin_layout')->with('admin.all_banner',$manage_banner); 

    }

         public function all_banner_short(){
        $this->AuthLogin();
        $all_banner = DB::table('tbl_banner')
        ->orderby('id','desc')->get();
        $manage_banner = view('admin.all_banner_short')->with('all_banner',$all_banner);
        return view('admin_layout')->with('admin.all_banner_short',$manage_banner); 

    }

    public function save_banner(Request $request){
    	$this->AuthLogin();
     	$data = array();
     	$data['banner_name'] = $request->banner_name;
     	$data['banner_desc'] = $request->banner_desc;
     	$data['banner_status'] = $request->banner_status;
        $get_image =$request->file('banner_image');

         	if($get_image){
         		$get_name_image = $get_image->getClientOriginalName();
         		$name_image = current(explode('.',$get_name_image ));
         		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
         		$get_image->move('public/upload/banner/', $new_image);
         		$data['banner_image'] = $new_image;

    	     	DB::table('tbl_banner')->insert($data);
    	     	Session::put('message','Thêm Banner thành công!');
    	     	return Redirect::to('add-banner');
         	}

     	$data['banner_image'] = '';
     	DB::table('tbl_banner')->insert($data);
     	Session::put('message','Thêm Banner thành công!');
     	return Redirect::to('add-banner');
}

	public function unactive_banner($id){
		$this->AuthLogin();
		DB::table('tbl_banner')->where('id',$id)->update(['banner_status'=>1]);
		Session::put('message','Hủy kích hoạt!');
		return Redirect::to('all-banner');

	}

	public function active_banner($id){
		$this->AuthLogin();
		DB::table('tbl_banner')->where('id',$id)->update(['banner_status'=>0]);
		Session::put('message','Kích hoạt thành công!');
		return Redirect::to('all-banner');

	}

    public function edit_banner($id){
        $this->AuthLogin();
        $edit_banner = DB::table('tbl_banner')->where('id',$id)->get();
        $manage_banner = view('admin.edit_banner')->with('edit_banner',$edit_banner);

        return view('admin_layout')->with('admin.edit_banner',$manage_banner);

    }

    public function update_banner(Request $request, $id){
        $this->AuthLogin();
        $data = array();
        $data['banner_name'] = $request->banner_name;

        $data['banner_desc'] = $request->banner_desc;
        $get_image =$request->file('banner_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image ));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/banner', $new_image);
            $data['banner_image'] = $new_image;

            DB::table('tbl_banner')->where('id',$id)->update($data);
            Session::put('message','Cập nhật Banner thành công!');
            return Redirect::to('all-banner');
        }

        DB::table('tbl_banner')->where('id',$id)->update($data);
        Session::put('message','Cập nhật Banner thành công!');
        return Redirect::to('all-banner');
    }

    public function delete_banner($id){
        $this->AuthLogin();
        DB::table('tbl_banner')->where('id',$id)->delete();
        Session::put('message','Xóa Banner thành công!');
            return Redirect::to('all-banner');

    }




}
