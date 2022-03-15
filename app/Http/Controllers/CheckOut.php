<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use DateTime;
use PDF;
use Illuminate\Support\Facades\Redirect;
session_start();


class CheckOut extends Controller
{	public function CusLogin($customer_id){
        $cus = Session::get('customer_id');
        if($cus!=$customer_id){
            return Redirect::to('/trang-chu')->send();
        }

    }


	  public function AuthLogin(){
        $admin = session::get('admin_id');
        if($admin){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }

    }

    public function add_order(Request $request){

        $customer_id = $request->customer_id;
        $keyword ='';

        if(isset($customer_id)){
          $address_id = $request->address_id;
          $payment = $request->payment;
          $first_price = $request->first_price;
          $card_number = $request->card_number;
        	$card_name = $request->card_name;
        	$card_date = $request->card_date;
        	$card_bank = $request->card_bank;

            if($first_price == 0){
            	session::put('message-b','Giỏ hàng trống!');
            	return Redirect::to('/gio-hang/'.$customer_id);
            }

          $mycart = DB::table('tbl_customer')
	        ->join('tbl_cart','tbl_customer.customer_id','=','tbl_cart.customer_id')->where('tbl_customer.customer_id',$customer_id)
	        ->join('tbl_cart_item','tbl_cart.cart_id','=','tbl_cart_item.cart_id')
	        ->join('tbl_book','tbl_cart_item.book_id','=','tbl_book.book_id')
	        ->get();

	        $address = DB::table('tbl_address')
            ->join('tbl_shipping','tbl_address.shipping_id','=','tbl_shipping.shipping_id')
            ->where('address_id',$address_id)->get();

          $contact =  DB::table('tbl_company_info')->get();

            if($payment == 2){
        		if($card_number == null || $card_name == null || $card_date == null){
        			session::put('message-b','Chưa nhập đủ thông tin thẻ!');
        			return view('pages.cart.checkout')->with('keyword',$keyword)->with('mycart',$mycart)->with('address',$address)->with('contact',$contact);
        		}

        	}
            $address2 = DB::table('tbl_address')
            ->join('tbl_shipping','tbl_address.shipping_id','=','tbl_shipping.shipping_id')
            ->where('address_id',$address_id)->first();

            $data =array();
            $data['customer_id'] = $customer_id;
            $data['order_status'] = '1';
            $data['order_address'] = $address2->address_detail;
            $data['order_name'] = $address2->customer_name;
            $data['order_phone'] = $address2->customer_phone;
            $data['order_shipping'] = $address2->shipping_id;
            $data['payment'] = $payment;
            $data['total_price'] = $request->total_price;
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('H:i:s d-m-Y');
            $data['order_time'] = $date;

            DB::table('tbl_order')->insert($data);            

	        $order = DB::table('tbl_order')->where('customer_id',$customer_id)->limit(5)->orderby('order_id','desc')->limit(1)->get(); 

	  		foreach($order as $key => $value){
	            	$order_id = $value->order_id;
	        }

	        if($payment == 2){
	        	

        		$card_array = array();
        		$card_array['card_number'] = $card_number;
        		$card_array['card_name'] = $card_name;
        		$card_array['card_date'] = $card_date;
        		$card_array['card_bank'] = $card_bank;
        		$card_array['order_id'] = $order_id;

        		DB::table('tbl_card')->insert($card_array);  

	        }

	        foreach($mycart as $key => $value){

	        $cart_id = $value->cart_id;
	        $book_id = $value->book_id;

	       $quantity = $value->quantity;
         $book = DB::table('tbl_book')->where('book_id',$book_id)->limit(1)->get();
         foreach($book as $key => $value){
                    $book_qty = $value->book_qty;
                }
                
                if($quantity > $book_qty){
                Session::put('message-b','Số lượng hàng còn lại là '.$book_qty);
                DB::table('tbl_order')->where('order_id',$order_id)->delete();
                DB::table('tbl_card')->where('order_id',$order_id)->delete();
                return Redirect::to('/chi-tiet-sach/'.$book_id); 
                }else{

	        $data2 = array();
	        
	        $data2['order_id'] = $order_id;	
	        $data2['book_id'] = $value->book_id;	
	        $data2['item_price'] = $value->book_price;
	        $data2['item_qty'] = $quantity;

	        DB::table('tbl_order_item')->insert($data2);

            $book_data = array();
            $book_data['book_qty'] = $value->book_qty - $quantity;
            DB::table('tbl_book')->where('book_id',$book_id )->update($book_data);

	        DB::table('tbl_cart_item')->where('book_id',$book_id)->where('cart_id',$cart_id)->delete();
	        }}
         		
            return Redirect::to('/dat-hang-thanh-cong/'.$customer_id); 

        }
	
  		}

  		 public function success_order($customer_id){
  		 	$this->CusLogin($customer_id);
		    $keyword ='';
		    $cate = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
		    $pub = DB::table('tbl_publisher')->orderby('publisher_id','desc')->get();
		    $contact =  DB::table('tbl_company_info')->get();
		    
		    return view('pages.checkout.success_checkout')->with('keyword',$keyword)->with('category',$cate)->with('publisher',$pub)->with('contact',$contact);
		}

		 public function all_order(){
  		 	$this->AuthLogin();
		    $all_order = DB::table('tbl_order')
		    ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
		    ->join('tbl_order_status','tbl_order.order_status','=','tbl_order_status.order_status_id')
		    ->orderby('tbl_order.order_status','asc')
	     	->orderby('tbl_order.order_id','desc')
	     	->paginate(20);
		    return view('admin.order.all_order')->with('all_order',$all_order);
		}


		 public function delete_order($order_id){
  		 	$this->AuthLogin();
		    
		    DB::table('tbl_order_item')->where('order_id',$order_id)->delete();
		    DB::table('tbl_order')->where('order_id',$order_id)->delete();

		    session::put('message','Xóa đơn hàng thành công!');
		    return Redirect::to('all-order');
		}

		 public function view_order($order_id){
  		 	$this->AuthLogin();
  		 	$keyword ='';
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

		    return view('admin.order.detail_order')->with('detail_order',$detail_order)->with('detail_order_item',$detail_order_item);
		}

		 public function print_order($checkout_code){
  		 	$this->AuthLogin();
  		 	$pdf =\App::make('dompdf.wrapper');
  		 	
  		 	$pdf->loadHTML($this->print_order_convert($checkout_code));
  		 	return $pdf->stream();
  		 }

  		 public function print_order_convert($checkout_code){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $day = date('d');
        $month = date('m');
        $year = date('Y');
  		 	$detail_order = DB::table('tbl_order')
		    ->where('order_id',$checkout_code)
		    ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
		    ->join('tbl_order_status','tbl_order.order_status','=','tbl_order_status.order_status_id')
		    ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.order_shipping')
		    ->join('tbl_payment','tbl_payment.payment_id','=','tbl_order.payment')
	     	->first();
        
        $detail_order_item = DB::table('tbl_order_item')
	     	->where('order_id',$checkout_code)
	        ->join('tbl_book','tbl_book.book_id','=','tbl_order_item.book_id')
	        ->get();

        $STT = 1; 
        $company =DB::table('tbl_company_info')->first();

	        $output = '';

	        $output.= '
	        <style>body{
	        	
	        	font-family: DejaVu Sans, Roboto;
				font-weight:400px;
	        }

	        </style>
          <div style="position: relative;"> 
	        <table style="">
                  <tr>
                    <td style="width: 240px;" rowspan="2"><img src="http://localhost:8080/onlinebook/public/frontend/images/logo/booklogo.png" style ="width: 200px;" alt="" /></td>
                    <td style="font-weight:1000; color:red; width: 350px; " >HÓA ĐƠN GIÁ TRỊ GIA TĂNG
                  </td>

           <td style="">Số: '.$detail_order->order_id.'
                  </td>
                  </tr>

                  <tr style=";">
                    <td style="margin-left: 590px;"> Ngày '.$day.' tháng '.$month.' năm '.$year.'</td>
                    <td style="width: 220px;"></td>
                  </tr>
                </table>
                <br>

                <table >
                  <tr >
                    <td style="width: 100px;">Đơn vị bán </td>
                    <td style=""><span style="color: #00adee;"><b>: '.$company->company_name.'</b></span>
                    </td>
                  </tr>
                  <tr >
                    <td style="">Mã số thuế </td>
                    <td style=""><span><b>: '.$company->company_tax.'</b></span>
                    </td>
                  </tr>
                  <tr >
                    <td style="">Địa chỉ </td>
                    <td style=""><span>: '.$company->company_address.'</span>
                    </td>
                  </tr>
                  <tr >
                    <td style="">Điện thoại </td>
                    <td style=""><span>: '.$company->company_phone.'</span>
                    </td>
                  </tr>
                </table>
                <br>
                <div style="border: 1px solid #666; padding: 5px;">
                 <table style="">
                   <tr >
                    <td style="width: 200px;">Họ tên người mua hàng </td>
                    <td style="">: '.$detail_order->order_name.'<span></span>
                    </td>
                  </tr>
                  
                  <tr >
                    <td style="">Đơn vị mua hàng </td>
                    <td style=""><span>: '.$detail_order->customer_name.'</span>
                    </td>
                  </tr>
               
                  <tr >
                    <td style="">Địa chỉ </td>
                    <td style=""><span>: '.$detail_order->order_address.'</span>
                    </td>
                  </tr>
               
                  <tr >
                    <td style="">Điện thoại </td>
                    <td style=""><span>: '.$detail_order->order_phone.'</span>
                    </td>
                  </tr>
           
                  <tr >
                    <td style="">Hình thức thanh toán </td>
                    <td style=""><span>: '.$detail_order->payment_name.'</span>
                    </td>
                  </tr>
                 </table></div>
                 <br>
                 <table style="border: 1px solid #666;" rows ="15">
                        <tr style="border: 1px solid #666;">
                          <td style="border-bottom:: 1px solid #666; border-right: 1px solid #666;"><b>STT</b></td>
                          <td style="width: 370px; padding: 5px; border-bottom:: 1px solid #666; border-right: 1px solid #666;"><b>Tên hàng hóa và dịch vụ</b></td>                         
                          <td style="padding: 5px; border-bottom: 1px solid #666;width: 20px; border-right: 1px solid #666;"><b>S.L</b></td>
                          <td style="padding: 5px; border-bottom:: 1px solid #666;width: 110px; border-right: 1px solid #666;"><b>Đơn giá</b></td>
                          <td style="padding: 5px; border-bottom:: 1px solid #666;width: 110px;"><b>Thành tiền</b></td>
                        </tr>';
                        foreach($detail_order_item as $key =>$value){


                        $output.= '
                      		<tr>
                      
                        <td>
                          '.$STT.'
                        </td>
                        <td>
                          '.$value->book_name.'
                        </td>
                        <td>
                          '.$value->item_qty.'
                        </td>
                        <td>
                          '.number_format($value->book_price,0,',','.').'đ'.'
                        </td>
                        <td>
                          '.number_format($value->item_qty * $value->book_price,0,',','.').'đ'.'
                        </td>
                      </tr>';
                      $STT++;
                      }
                      $output.= '
                      <tr>
                        <td>'.$STT.'</td>
                        <td>Phí xửa lý vào giao hàng</td>
                        <td>1</td>
                        <td>'.number_format($detail_order->shipping_price,0,',','.').'đ'.'</td>
                        <td>'.number_format($detail_order->shipping_price,0,',','.').'đ'.'</td>
                      </tr>
                      <tr style="position: absolute; bottom: 30;">
                      	<td colspan ="4" style="text-align: center; border-top: 1px solid #666; border-right: 1px solid #666;"><b>Tổng cộng</b></td>
                      	<td style=" border-top: 1px solid #666;"><b>'.number_format($detail_order->total_price,0,',','.').'đ'.'</b></td>
                      </tr>
                 </table>
                 <br>
                 <div style="position: absolute; bottom: 60;">
                     <table>
                     <tr>
                     <td style="width: 50px;"> </td>
                     <td style="width: 450px;"><b>Người mua hàng</b></td>
                     <td><b>Người bán hàng</b></td>
                     </tr>
                     <tr>
                     <td style="width: 50px;"> </td>
                     <td><i>(Ký, ghi rõ họ tên)</i></td>
                     <td><i>(Ký, ghi rõ họ tên)</i></td>
                     </tr>
                     </table>
                 </div>
             </div>
                 ' 
	        ;

	        return $output;

  		 }



		 public function accept_order($order_id){
  		 	$this->AuthLogin();
        $admin = session::get('admin_id');
		   	$data['order_status'] = 2;
        $data['admin_id'] = $admin;
		   	DB::table('tbl_order')->where('order_id',$order_id)->update($data);
		   	session::put('message','Cập nhật trạng thái đơn hàng thành công!');
		    return Redirect::to('/all-order');
		}
		 public function being_transported($order_id){
  		 	$this->AuthLogin();
		   	$data['order_status'] = 3;
		   	DB::table('tbl_order')->where('order_id',$order_id)->update($data);
		   	session::put('message','Cập nhật trạng thái đơn hàng thành công!');
		    return Redirect::to('/all-order');
		}
		 public function update_order_status(Request $request){
  		 	$this->AuthLogin();
  		 	$order_status = $request->order_status;

  		 	$order_id = $request->input('order_id');
  		 	if($order_id == null){
  		 		session::put('message','Chưa chọn đơn hàng nào!');
		    	return Redirect::to('/all-order');
  		 	}else{
			foreach($order_id as $value){
			 	$data['order_status'] = $order_status;
		   		DB::table('tbl_order')->where('order_id',$value)->update($data);
			}
		   	session::put('message','Cập nhật trạng thái đơn hàng thành công!');
		    return Redirect::to('/all-order');
		}
	}
		 public function successful_delivery($order_id){
  		 	$this->AuthLogin();
		   	$data['order_status'] = 4;
		   	DB::table('tbl_order')->where('order_id',$order_id)->update($data);
		   	session::put('message','Cập nhật trạng thái đơn hàng thành công!');
		    return Redirect::to('/all-order');
		}
}
