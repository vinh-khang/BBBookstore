<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Http\Requests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class Post extends Controller
{ 	public function AuthLogin(){
        $admin = session::get('admin_id');
        if($admin){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }

    }

    public function all_bb_post(){
     	$this->AuthLogin();

     	$all_bb_post = DB::table('tbl_news')
        ->where('news_type',0)
     	->orderby('news_id','asc')->get();

     	return view('admin.post.all_bb_post')->with('all_bb_post',$all_bb_post); 

    }


    public function edit_bb_post($bb_post_id){
        $this->AuthLogin();
        $edit_bb_post = DB::table('tbl_news')->where('news_id',$bb_post_id)->get();

        return view('admin.post.edit_bb_post')->with('edit_bb_post',$edit_bb_post);

    }

    public function update_bb_post(Request $request, $bb_post_id){
        $this->AuthLogin();
        $data = array();
        $data['news_title'] = $request->bb_title;
        $data['news_content'] = $request->bb_content;
        $admin = session::get('admin_id');
        $data['admin_id'] = $admin;

        DB::table('tbl_news')->where('news_id',$bb_post_id)->update($data);
        Session::put('message','Cập nhật bài viết thành công!');
        return Redirect::to('all-bb-post');
    }

    public function add_news(){
        $this->AuthLogin();

        return view('admin.post.add_news'); 

    }

     public function save_news(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['news_title'] = $request->news_title;
        $data['news_auth'] = $request->news_auth;
        $data['news_desc'] = $request->news_desc;
        $data['news_content'] = $request->news_content;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('d-m-Y');
        $data['news_date'] = $date;
        $data['news_type'] = $request->news_type;
        $admin = session::get('admin_id');
        $data['admin_id'] = $admin;
        $get_image =$request->file('news_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image ));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/news', $new_image);
            $data['news_image'] = $new_image;

            DB::table('tbl_news')->insert($data);
            Session::put('message','Thêm tin thành công!');
            return Redirect::to('add-news');
        }

        $data['news_image'] = '';
        DB::table('tbl_news')->insert($data);
        Session::put('message','Thêm tin thành công!');
        return Redirect::to('add-news');
}
    
    public function all_news(){
        $this->AuthLogin();

        $all_news = DB::table('tbl_news')
        ->wherenotin('news_type',[0])
        ->orderby('news_id','desc')->get();

        return view('admin.post.all_news')->with('all_news',$all_news); 

    }

     public function edit_news($news_id){
        $this->AuthLogin();
        $edit_news = DB::table('tbl_news')->where('news_id',$news_id)->get();
        
        return view('admin.post.edit_news')->with('edit_news',$edit_news);

    }

     public function delete_news($news_id){
        $this->AuthLogin();
        $edit_news = DB::table('tbl_news')->where('news_id',$news_id)->delete();

        Session::put('message','Xoá tin thành công!');
        return Redirect::to('all-news');

    }

    public function update_news(Request $request, $news_id){
        $this->AuthLogin();
        $data = array();
        $data['news_title'] = $request->news_title;
        $data['news_auth'] = $request->news_auth;
        $data['news_desc'] = $request->news_desc;
        $data['news_content'] = $request->news_content;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('d-m-Y');
        $data['news_date'] = $date;
        $data['news_type'] = $request->news_type;
        $admin = session::get('admin_id');
        $data['admin_id'] = $admin;
        $get_image =$request->file('news_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image ));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/news', $new_image);
            $data['news_image'] = $new_image;

            DB::table('tbl_news')->where('news_id',$news_id)->update($data);
            Session::put('message','Cập nhật tin thành công!');
            return Redirect::to('all-news');
        }

        DB::table('tbl_news')->where('news_id',$news_id)->update($data);
        Session::put('message','Cập nhật tin thành công!');
        return Redirect::to('all-news');
    }


}
