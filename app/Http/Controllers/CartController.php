<?php
use Gloudemans\Shoppingcart\Facades\Cart; 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class CartController extends Controller{
		public function CusLogin($customer_id){
        $cus = session::get('customer_id');
        if($cus!=$customer_id){
            return Redirect::to('/trang-chu')->send();
        }

    }

  		public function add_cart(Request $request){
        
        $customer_id = $request->customer_id;
        $book_id = $request->book_id; 
        
        if(isset($customer_id)){
            $book_id = $request->book_id;
            
       
            $cart = DB::table('tbl_cart')->where('customer_id',$customer_id)->get();
            foreach($cart as $key => $value){
                $cart_id = $value->cart_id;
            }

            $count_cart = DB::table('tbl_cart_item')->where('cart_id',$cart_id)->where('book_id',$book_id)->limit(1)->get();

            if($count_cart != null){
                foreach($count_cart as $key =>$value){
                $count = $value->quantity;
            }
                $quantity = $count + $request->qty;
                $book = DB::table('tbl_book')->where('book_id',$book_id)->limit(1)->get();
                foreach($book as $key => $value){
                    $book_qty = $value->book_qty;
                }
                
                if($quantity > $book_qty){
                Session::put('message-b','Số lượng hàng còn lại là '.$book_qty);
                return Redirect::to('/chi-tiet-sach/'.$book_id); 
                }

                if($quantity > 15){
                    Session::put('message-b','Số lượng hàng được mua tối đa là 15!');
                    return Redirect::to('/chi-tiet-sach/'.$book_id); 
                }


            }else{
                
                $quantity = $request->qty;
                $book = DB::table('tbl_book')->where('book_id',$book_id)->limit(1)->get();
                foreach($book as $key => $value){
                    $book_qty = $value->book_qty;
                }
                
                if($quantity > $book_qty){
                Session::put('message-b','Số lượng hàng còn lại là '.$book_qty);
                return Redirect::to('/chi-tiet-sach/'.$book_id); 
                }
                if($quantity > 15){
                    Session::put('message-b','Số lượng hàng được mua tối đa là 15!');
                    return Redirect::to('/chi-tiet-sach/'.$book_id); 
            }

            }      

            $cart = DB::table('tbl_cart')->where('customer_id',$customer_id)->get();
            foreach($cart as $key => $value){
                $cart_id = $value->cart_id;
            }

            $data =array();
            $data['book_id'] = $book_id;
            $data['cart_id'] = $cart_id;
            
            $old_book_id ="";
            $old_quantity="";
            $old_book = DB::table('tbl_cart_item')->where('cart_id',$cart_id)->where('book_id',$book_id)->limit(1)->get();
            foreach($old_book as $key => $value){
            $old_book_id = $value->book_id;
            $old_quantity = $value->quantity;
            }

            if($book_id == $old_book_id){

                $data['quantity'] = $request->qty + $old_quantity;
                DB::table('tbl_cart_item')->where('cart_id',$cart_id)->where('book_id',$old_book_id)->update($data);

                Session::put('message-g','Đã thêm vào giỏ hàng!');
                return Redirect::to('/chi-tiet-sach/'.$book_id); 
            }else{
                $data['quantity'] = $request->qty;
                DB::table('tbl_cart_item')->where('cart_id',$cart_id)->insert($data);

                Session::put('message-g','Đã thêm vào giỏ hàng!');
                return Redirect::to('/chi-tiet-sach/'.$book_id); }

        }else{
            Session::put('message-b','Vui lòng đăng nhập để mua hàng!');
            return Redirect::to('/dang-nhap');

        }
	
  		}


      public function show_cart($customer_id){
        $this->CusLogin($customer_id);
        $keyword ='';

        $contact =  DB::table('tbl_company_info')->get();
        $mycart = DB::table('tbl_customer')
        ->join('tbl_cart','tbl_customer.customer_id','=','tbl_cart.customer_id')->where('tbl_customer.customer_id',$customer_id)
        ->join('tbl_cart_item','tbl_cart.cart_id','=','tbl_cart_item.cart_id')
        ->join('tbl_book','tbl_cart_item.book_id','=','tbl_book.book_id')
        ->get();

        foreach($mycart as $key => $value){
            $item_qty = $value->quantity;
            $book_qty = $value->book_qty;
            $book_id = $value->book_id;

            if($book_qty == 0){
                DB::table('tbl_cart_item')
                ->join('tbl_cart','tbl_cart.cart_id','=','tbl_cart_item.cart_id')
                ->where('tbl_cart_item.book_id',$book_id)->where('tbl_cart.customer_id',$customer_id)
                ->delete();
            }else{                
            if($book_qty < $item_qty){
                $data_qty = array();
                $data_qty['quantity'] = $book_qty;
                DB::table('tbl_customer')
                ->join('tbl_cart','tbl_customer.customer_id','=','tbl_cart.customer_id')->where('tbl_customer.customer_id',$customer_id)
                ->join('tbl_cart_item','tbl_cart.cart_id','=','tbl_cart_item.cart_id')
                ->join('tbl_book','tbl_cart_item.book_id','=','tbl_book.book_id')
                ->where('tbl_cart_item.book_id',$book_id)->update($data_qty);

            }
        }
        }

        $mycart = DB::table('tbl_customer')
        ->join('tbl_cart','tbl_customer.customer_id','=','tbl_cart.customer_id')->where('tbl_customer.customer_id',$customer_id)
        ->join('tbl_cart_item','tbl_cart.cart_id','=','tbl_cart_item.cart_id')
        ->join('tbl_book','tbl_cart_item.book_id','=','tbl_book.book_id')
        ->get();


        $address_id = Session::get('add_id');
        $address = DB::table('tbl_address')->where('address_id',$address_id)->where('customer_id',$customer_id)->get();  
        if($address == null){  
        $address = DB::table('tbl_address')->where('customer_id',$customer_id)->where('address_default',1)->get(); 
        }

        return view('pages.cart.show_cart')->with('keyword',$keyword)->with('mycart',$mycart)->with('address',$address)->with('contact',$contact);

      }

      public function delete_cart(Request $request){
        $customer_id = $request->customer_id;
        $this->CusLogin($customer_id);
        $book_id = $request->book_id;

        DB::table('tbl_cart_item')
        ->join('tbl_cart','tbl_cart.cart_id','=','tbl_cart_item.cart_id')
        ->where('tbl_cart_item.book_id',$book_id)->where('tbl_cart.customer_id',$customer_id)
        ->delete();

      Session::put('message-g','Đã xóa sản phẩm khỏi giỏ hàng!');
      return Redirect::to('/gio-hang/'.$customer_id);

      }

        public function show_address($customer_id){
        $this->CusLogin($customer_id);
        $contact =  DB::table('tbl_company_info')->get();
        $keyword='';
        $address = DB::table('tbl_address')->where('customer_id',$customer_id)
        ->orderby('address_default','desc')->orderby('address_id','desc')->get();

        return view('pages.checkout.show_address')->with('keyword',$keyword)->with('address',$address)->with('customer_id',$customer_id)->with('contact',$contact);

        }   

        

      public function save_delivery_address($address_id, $customer_id){
        $this->CusLogin($customer_id);
        $keyword='';
        $add_id = $address_id;

        Session::put('add_id',$add_id);
        return Redirect::to('/gio-hang/'.$customer_id);

        }

      public function checkout(Request $request){
        $keyword ='';
        $contact =  DB::table('tbl_company_info')->get();
        $customer_id = $request->customer_id;
        $address_id = $request->address_id;
        $book_id = $request->book_id;

        if(!isset($address_id)){
            Session::put('message-b','Vui lòng thêm địa chỉ giao hàng!');
            return Redirect::to('/so-dia-chi/'.$customer_id);
        }
        if(isset($book_id)){

        $mycart = DB::table('tbl_customer')
        ->join('tbl_cart','tbl_customer.customer_id','=','tbl_cart.customer_id')->where('tbl_customer.customer_id',$customer_id)
        ->join('tbl_cart_item','tbl_cart.cart_id','=','tbl_cart_item.cart_id')
        ->join('tbl_book','tbl_cart_item.book_id','=','tbl_book.book_id')
        ->get(); 

        $address = DB::table('tbl_address')
        ->join('tbl_shipping','tbl_address.shipping_id','=','tbl_shipping.shipping_id')
        ->where('address_id',$address_id)->get();

        return view('pages.cart.checkout')->with('keyword',$keyword)->with('mycart',$mycart)->with('address',$address)->with('contact',$contact);

      }else{
        $customer_id = $request->customer_id;
        Session::put('message-b','Giỏ hàng trống!');
        return Redirect::to('/gio-hang/'.$customer_id);
      }
    }

    
}
