<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Http\Requests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class AdminController extends Controller
{
    public function AuthLogin(){
        $admin = session::get('admin_id');
        if($admin){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }

    }


    public function index(){
    	return view('admin_login');


    }

    public function show_dashboard(){
        $this->AuthLogin();
        //Thời gian
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $this_month = date('0:0:0 1-m-Y');

        $order = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->where('order_status',1)
        ->orderby('tbl_order.order_id','desc')->limit(3)->get();



        //Đơn mới
        $new_order = DB::table('tbl_order')
        ->where('order_status',1)
        ->orderby('tbl_order.order_id','desc')->get();

        $new_order_count = 0;
        foreach($new_order as $key => $value){
            $new_order_count = $new_order_count + 1;
        }

        //Đơn đã duyệt
        $accepted_order = DB::table('tbl_order')
        ->where('order_status',2)
        ->orderby('tbl_order.order_id','desc')->get();

        $accepted_order_count = 0;
        foreach($accepted_order as $key => $value){
            $accepted_order_count = $accepted_order_count + 1;
        }

        //Đơn đang giao
        $trans_order = DB::table('tbl_order')
        ->where('order_status',3)
        ->orderby('tbl_order.order_id','desc')->get();

        $trans_order_count = 0;
        foreach($trans_order as $key => $value){
            $trans_order_count = $trans_order_count + 1;
        }

        //Sản phẩm hết
        $out_stock = DB::table('tbl_book')->orderby('book_qty','asc')->limit(5)->get();

        //Đơn hàng đã giao
        $count_order = 0;
        $success_order =  DB::table('tbl_order')->get();

        foreach($success_order as $key =>$value1){
            if(strtotime($value1->order_time) >= strtotime($this_month)){
                $count_order++;
            }
        }

        //Tiền kiếm được trong tháng
        $total_sale = 0;
        $money =  DB::table('tbl_order')->orderby('order_id','desc')->get();
        

        foreach($money as $key =>$value){
            if((strtotime($value->order_time) >= strtotime($this_month)) ){
                $total_sale = $total_sale + $value->total_price;
            }
        }

        //Thống kê doanh số
        
        $order_date = date('d-m-Y');
        $sta = array();
        $sta['order_date'] = $order_date;
        $total = 0;
        $total_order = 0;
        foreach($money as $key =>$value2){
            if(strtotime($value2->order_time) >= strtotime($order_date)){
                $total = $total + $value2->total_price;
                $total_order ++;
            }
        }

        $sta['total_sales'] = $total;
        $sta['total_order'] = $total_order;

        $today =  DB::table('tbl_statistic')->orderby('id_sta','desc')->first();
        if(strtotime($today->order_date) == strtotime($order_date) ){
            DB::table('tbl_statistic')->where('id_sta',$today->id_sta)->update($sta);
        }else{
            DB::table('tbl_statistic')->insert($sta);
        }

        
        $static = DB::table('tbl_statistic')->limit(15)->orderby('id_sta','desc')->get();

        //Tổng số sách
        $count_book = 0;
        $book = DB::table('tbl_book')->get();
        foreach($book as $key =>$value2){
            $count_book++;
        }

        //Tổng số tài khoản
        $count_cus = 0;
        $cus = DB::table('tbl_customer')->get();
        foreach($cus as $key){
            $count_cus++;
        }

        //Kho hàng
        $hethang = 0;
        $nho5 = 0;
        $nho10 = 0;

        $hang = DB::table('tbl_book')->get();
        foreach($hang as $key=> $value){
            if($value->book_qty == 0){
                $hethang++;
            }
            if(($value->book_qty > 0) && ($value->book_qty <= 5)){
                $nho5++;
            }
            if(($value->book_qty > 5) && ($value->book_qty <= 10)){
                $nho10++;
            }
        }


    	return view('admin.show_dashboard')
        ->with('order', $order)
        ->with('total_sale',$total_sale)
        ->with('new_order_count',$new_order_count)
        ->with('count_book',$count_book)
        ->with('count_cus',$count_cus)
        ->with('count_order',$count_order)
        ->with('static',$static)
        ->with('hethang',$hethang)
        ->with('nho5',$nho5)->with('nho10',$nho10)
        ->with('accepted_order_count',$accepted_order_count)
        ->with('trans_order_count',$trans_order_count)
        ->with('out_stock',$out_stock);
    }

    public function dashboard(request $request){
    	$admin_code = $request->admin_code;
    	$admin_password = md5($request->admin_password);

    	$result = DB::table('tbl_admin')->where('admin_code',$admin_code)->where('admin_password',$admin_password)->first();

    	if($result){
    		session::put('admin_name',$result->admin_name);
    		session::put('admin_id',$result->admin_id);
    		return Redirect::to('/dashboard');
    	}else{
    		session::put('message','Thông tin đăng nhập chưa chính xác!');
    		return Redirect::to('/admin');

    	}



    }

    public function revenue(){
        $this->AuthLogin();

        $revenue = DB::table('tbl_statistic')
        ->orderby('id_sta','desc')->paginate(20);;

        return view('admin.order.revenue')->with('revenue',$revenue); 

    }




      public function logout(){
        $this->AuthLogin();
    	session::put('admin_name',null);
    	session::put('admin_id',null);
    	return Redirect::to('/admin');
    }

    //Company

    public function contact_us(){
        $this->AuthLogin();

        $contact = DB::table('tbl_company_info')
        ->limit(1)->get();

        return view('admin.company.web_contact')->with('contact',$contact); 

    }

     public function update_contact(Request $request, $company_info_id){
        $this->AuthLogin();

        $data =array();
        $data['company_facebook'] = $request->fb;
        $data['company_instagram'] = $request->in;
        $data['company_youtube'] = $request->yt;
        $data['company_hotline'] = $request->hl;
        $data['company_email'] = $request->em;
        DB::table('tbl_company_info')->where('company_info_id',$company_info_id)
        ->update($data);
        session::put('message','Cập nhật thành công!');
        return Redirect::to('all-contact'); 

    }

     public function company_info(){
        $this->AuthLogin();

        $info = DB::table('tbl_company_info')
        ->limit(1)->get();

        return view('admin.company.company_info')->with('info',$info); 

    }

    public function update_company_info(Request $request, $company_info_id){
        $this->AuthLogin();

        $data =array();
        $data['company_address'] = $request->ad;
        $data['company_name'] = $request->na;
        $data['company_tax'] = $request->tax;
        $data['company_phone'] = $request->ph;

        DB::table('tbl_company_info')->where('company_info_id',$company_info_id)
        ->update($data);
        session::put('message','Cập nhật thành công!');
         return Redirect::to('all-company-info'); 

    }
}
