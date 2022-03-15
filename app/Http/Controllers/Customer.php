<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;
session_start();

class Customer extends Controller
{	 public function CusLogin($customer_id){
        $cus = session::get('customer_id');
        if($cus!=$customer_id){
            return Redirect::to('/trang-chu')->send();
        }

    }
    //
    public function user_login(){
    	$keyword='';
    	$customer_phone='';
    	$customer_password='';

    	$cate = DB::table('tbl_category_product')->orderby('category_id','asc')->get();
  		$pub = DB::table('tbl_publisher')->orderby('publisher_id','asc')->get();
  		$contact =  DB::table('tbl_company_info')->get();

    	return view('pages.login.user_login')->with('category', $cate)->with('publisher', $pub)->with('keyword',$keyword)->with('customer_phone',$customer_phone)->with('customer_password',$customer_password)->with('contact',$contact);

    }

    public function add_customer(Request $request){
    	$customer_phone = $request->customer_phone;
    	$customer_password = $request->customer_password;
        $customer_password_2 = $request->customer_password_2;
    	$keyword='';
        $contact =  DB::table('tbl_company_info')->get();
        $result = DB::table('tbl_customer')->where('customer_phone',$customer_phone)->get();

        if($customer_password!=$customer_password_2){
           Session::put('message-b','Mật khẩu nhập lại không đúng!');
           return Redirect::to('/dang-nhap'); 
        }else{
        if($result != null){
            Session::put('message-b','SĐT đã đăng ký, vui lòng chọn số khác!');
            return Redirect::to('/dang-nhap');
        }else{
    	$cate = DB::table('tbl_category_product')->orderby('category_id','asc')->get();
  		$pub = DB::table('tbl_publisher')->orderby('publisher_id','asc')->get();

    	$data = array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_phone'] = $request->customer_phone;
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_password'] = md5($request->customer_password);

    	DB::table('tbl_customer')->insert($data);
    	Session::put('message-g','Đăng ký thành công!');

        $cus = DB::table('tbl_customer')->where('customer_phone',$customer_phone)->get();
        foreach($cus as $key => $value){
            $id = $value->customer_id;
        }

        $data2 = array();
        $data2['customer_id'] = $id;

        DB::table('tbl_cart')->insert($data2);

    	return view('pages.login.user_login')->with('customer_phone',$customer_phone)->with('customer_password',$customer_password)->with('keyword',$keyword)->with('category', $cate)->with('publisher', $pub)->with('contact',$contact);

        }}
    }

    public function update_customer(Request $request){
        $customer_phone = $request->customer_phone;
        $customer_password = $request->customer_password;
        $customer_password_2 = $request->customer_password_2;
        $keyword='';

        $id='';
        $result = DB::table('tbl_customer')->where('customer_phone',$customer_phone)->get();
        foreach($result as $key => $value){
            $id = $value->customer_id;
        }

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;

        DB::table('tbl_customer')->where('customer_id',$id)->update($data);
        Session::put('message-g','Cập nhật thông tin thành công!');

        return Redirect::to('/thong-tin-tai-khoan/'.$id);
    }

     public function login_customer(request $request){
    	$customer_phone = $request->customer_phone;
    	$customer_password = md5($request->customer_password);

    	$result = DB::table('tbl_customer')->where('customer_phone',$customer_phone)->where('customer_password',$customer_password)->first();
    	if($result){
    		session::put('customer_name',$result->customer_name);
    		session::put('customer_id',$result->customer_id);
            if($request->remember != null){
                Cookie::queue('customer_phone',$customer_phone, 60*24*30);
                Cookie::queue('customer_password',$request->customer_password, 60*24*30);
            }
    		return Redirect::to('trang-chu');
    	}else{
    		session::put('message-b','Thông tin đăng nhập không chính xác!');
    		return Redirect::to('/dang-nhap');

    	}

    }

    public function profile($customer_id){
        $this->CusLogin($customer_id);

        $keyword='';
        $contact =  DB::table('tbl_company_info')->get();
        $result = DB::table('tbl_customer')->where('customer_id',$customer_id)->get();
        foreach($result as $key =>$value){
        $customer_name = $value->customer_name;
        $customer_phone = $value->customer_phone;
        $customer_email = $value->customer_email;
    }

        return view('pages.customer.customer_profile')->with('keyword',$keyword)->with('customer_name',$customer_name)->with('customer_phone',$customer_phone)->with('customer_email',$customer_email)->with('contact',$contact);
    }

    public function my_order($customer_id){
        $this->CusLogin($customer_id);

        $keyword='';
         $contact =  DB::table('tbl_company_info')->get();
        $order = DB::table('tbl_order')->where('customer_id',$customer_id)
        ->join('tbl_order_status','tbl_order.order_status','=','tbl_order_status.order_status_id')
        ->orderby('tbl_order.order_id','desc')->get();

        $order_item = DB::table('tbl_order_item')
        ->join('tbl_book','tbl_order_item.book_id','=','tbl_book.book_id')
        ->join('tbl_order','tbl_order.order_id','=','tbl_order_item.order_id')
        ->where('tbl_order.customer_id',$customer_id)
        ->get();

        return view('pages.customer.customer_order')->with('keyword',$keyword)->with('order',$order)->with('order_item',$order_item)->with('contact',$contact);
    }

    public function my_order_detail($order_id,$customer_id){

            $this->CusLogin($customer_id);
            $keyword ='';
            $contact =  DB::table('tbl_company_info')->get();
            $detail_order = DB::table('tbl_order')
            ->where('order_id',$order_id)
            ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
            ->join('tbl_order_status','tbl_order.order_status','=','tbl_order_status.order_status_id')
            ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.order_shipping')
            ->join('tbl_payment','tbl_payment.payment_id','=','tbl_order.payment')
            ->get();

            $detail_order_item = DB::table('tbl_order_item')
            ->where('order_id',$order_id)
            ->join('tbl_book','tbl_book.book_id','=','tbl_order_item.book_id')
            ->get();

            return view('pages.customer.my_order_detail')->with('detail_order',$detail_order)->with('detail_order_item',$detail_order_item)->with('contact',$contact)->with('keyword',$keyword);
        }


    public function customer_address($customer_id){
        $this->CusLogin($customer_id);

        $keyword='';
        $contact =  DB::table('tbl_company_info')->get();
        $address = DB::table('tbl_address')->where('customer_id',$customer_id)
        ->orderby('address_default','desc')->orderby('address_id','desc')->get();

        return view('pages.customer.customer_address')->with('keyword',$keyword)->with('address',$address)->with('customer_id',$customer_id)->with('contact',$contact);
    }

    public function add_address($customer_id){
        $this->CusLogin($customer_id);

        $keyword='';
        $provine = DB::table('tbl_shipping')->get();
         $contact =  DB::table('tbl_company_info')->get();
        return view('pages.customer.add_address')->with('keyword',$keyword)->with('provine',$provine)->with('customer_id',$customer_id)->with('contact',$contact);
    }

     public function save_address(Request $request){
        $shipping_id = $request->shipping_id;
        $customer_id = $request->customer_id;
        if($shipping_id != 0){
        $address_detail = $request->address_detail;
        $customer_phone = $request->customer_phone;
        $customer_name = $request->customer_name;
        
        
        $data = array();

        $data['address_detail'] = $address_detail;
        $data['customer_phone'] = $customer_phone;
        $data['customer_name'] = $customer_name;
        $data['shipping_id'] = $shipping_id;
        $data['customer_id'] = $customer_id;
        $address_default = 0;
        $address_default_address = DB::table('tbl_address')->where('customer_id',$customer_id)->get();
        if($address_default_address == null){
             $address_default = 1;
        }
        $data['address_default'] = $address_default;
        DB::table('tbl_address')->insert($data);
        Session::put('message-g','Thêm địa chỉ giao hàng thành công!');
        return Redirect::to('/so-dia-chi/'.$customer_id);
    }else{
        Session::put('message-b','Chưa chọn Tỉnh/Thành phố!');
        return Redirect::to('/them-dia-chi/'.$customer_id);
    }
}
    public function edit_address($address_id, $customer_id){
        $this->CusLogin($customer_id);

        $keyword='';
        $contact =  DB::table('tbl_company_info')->get();
        $provine = DB::table('tbl_shipping')->get();
        $address = DB::table('tbl_address')->where('address_id',$address_id)->get();
        return view('pages.customer.edit_address')->with('keyword',$keyword)->with('provine',$provine)->with('address',$address)->with('customer_id',$customer_id)->with('address_id',$address_id)->with('contact',$contact);
    }

    public function delete_address($address_id, $customer_id){
        $this->CusLogin($customer_id);
        DB::table('tbl_address')->where('address_id',$address_id)->delete();
        Session::put('message-g','Xóa địa chỉ giao hàng thành công!');
        return Redirect::to('/so-dia-chi/'.$customer_id);
    }

    public function update_address(Request $request){
        $shipping_id = $request->shipping_id;
        $customer_id = $request->customer_id;
        $address_id = $request->address_id;

        if($shipping_id != 0){
        $address_detail = $request->address_detail;
        $customer_phone = $request->customer_phone;
        $customer_name = $request->customer_name;
        $address_default = $request->address_default;
        
        $data = array();

        $data['address_detail'] = $address_detail;
        $data['customer_phone'] = $customer_phone;
        $data['customer_name'] = $customer_name;
        $data['shipping_id'] = $shipping_id;
        if($address_default == 1){
        $data1 = array();
        $data1['address_default'] = 0;
        DB::table('tbl_address')->where('customer_id',$customer_id)->update($data1);
        $data2['address_default'] = $address_default;
        DB::table('tbl_address')->where('address_id',$address_id)->update($data2);
        }

        DB::table('tbl_address')->where('address_id',$address_id)->update($data);
        Session::put('message-g','Cập nhật địa chỉ giao hàng thành công!');
        return Redirect::to('/so-dia-chi/'.$customer_id);
    }else{
        Session::put('message-b','Chưa chọn Tỉnh/Thành phố!');
        return Redirect::to('/chinh-sua-dia-chi/'.$address_id.'/'.$customer_id);
    }
}

    public function logout_customer(){
    	session::put('customer_name',null);
    	session::put('customer_id',null);
    	return Redirect::to('/trang-chu');
    }

    
}
