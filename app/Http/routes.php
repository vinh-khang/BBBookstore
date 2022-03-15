<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//frontend
Route::get('/','HomeController@index' );
Route::get('/trang-chu','HomeController@index' );

Route::get('/tu-sach/','HomeController@bookcase_all' );

//Sach
Route::get('/sach-yeu-thich','HomeController@show_favorite' );

//Tacgia
Route::get('/tac-gia/','HomeController@author_all' );
Route::get('/chi-tiet-tac-gia/{author_id}','Author@detail_author' );

//Tab
Route::get('/gioi-thieu','HomeController@intro' );

Route::get('/tin-tuc','HomeController@news_all' );
Route::get('/tin-moi','HomeController@new_news' );
Route::get('/thong-bao','HomeController@notification' );
Route::get('/diem-sach','HomeController@book_review' );
Route::get('/xem-tin/{news_id}','HomeController@read_news' );

Route::get('/ho-tro','HomeController@support' );
Route::post('/send-support','HomeController@send_support' );
Route::get('/dieu-khoan-su-dung','HomeController@term' );
Route::get('/chinh-sach-doi-tra','HomeController@return_policy' );
Route::get('/chinh-sach-bao-mat','HomeController@security' );
Route::get('/qui-dinh-giao-hang','HomeController@delivery' );
Route::get('/cau-hoi-thuong-gap','HomeController@question' );

//Danh muc va nha phat hanh trang chu
Route::get('/danh-muc-sach/{category_id}','CategoryProduct@show_category_home' );
Route::get('/nha-phat-hanh/{publisher_id}','Publisher@show_publisher_home' );

//San pham
Route::get('/chi-tiet-sach/{book_id}','BookController@detail_book' );
Route::post('/tim-kiem/','BookController@search_book' );




//backend
Route::get('/admin','AdminController@index' );
Route::get('/dashboard','AdminController@show_dashboard' );
Route::get('/logout','AdminController@logout' );
Route::post('/admin-dashboard','AdminController@dashboard' );


//Category
Route::get('/add-category-product','CategoryProduct@add_category_product' );
Route::get('/all-category-product','CategoryProduct@all_category_product' );
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product' );
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product' );

Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product' );
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product' );

Route::post('/save-category-product','CategoryProduct@save_category_product' );
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product' );

//Publisher
Route::get('/add-publisher','Publisher@add_publisher' );
Route::get('/all-publisher','Publisher@all_publisher' );
Route::get('/edit-publisher/{publisher_id}','Publisher@edit_publisher' );
Route::get('/delete-publisher/{publisher_id}','Publisher@delete_publisher' );

Route::get('/unactive-publisher/{publisher_id}','Publisher@unactive_publisher' );
Route::get('/active-publisher/{publisher_id}','Publisher@active_publisher' );

Route::post('/save-publisher','Publisher@save_publisher' );
Route::post('/update-publisher/{publisher_id}','Publisher@update_publisher' );

//Book
Route::get('/add-book','BookController@add_book' );
Route::get('/all-book','BookController@all_book' );
Route::get('/all-stock-book','BookController@all_stock_book' );
Route::get('/all-desc-stock-book','BookController@all_desc_stock_book' );
Route::get('/edit-book/{book_id}','BookController@edit_book' );
Route::get('/delete-book/{book_id}','BookController@delete_book' );

Route::get('/unactive-book/{book_id}','BookController@unactive_book' );
Route::get('/active-book/{book_id}','BookController@active_book' );

Route::post('/save-book','BookController@save_book' );
Route::post('/update-book/{book_id}','BookController@update_book' );

Route::post('/search-book','BookController@search_allbook' );

Route::post('/update-book-author','BookController@update_book_author' );
Route::get('/delete-book-author/{book_id}','BookController@delete_book_author' );

Route::get('/favorite','BookController@favorite' );
Route::post('/search-favorite','BookController@search_favorite' );
Route::get('/add-favorite/{book_id}','BookController@add_favorite' );
Route::get('/delete-favorite/{book_id}','BookController@delete_favorite' );

Route::get('/selling','BookController@selling' );
Route::post('/search-selling','BookController@search_selling' );
Route::post('/add-selling','BookController@add_selling' );


//Author
Route::get('/add-author','Author@add_author' );
Route::get('/add-book-author','Author@add_book_author' );
Route::get('/all-author','Author@all_author' );
Route::get('/edit-author/{author_id}','Author@edit_author' );
Route::get('/delete-author/{author_id}','Author@delete_author' );

Route::get('/unactive-author/{author_id}','Author@unactive_author' );
Route::get('/active-author/{author_id}','Author@active_author' );

Route::post('/save-author','Author@save_author' );
Route::post('/update-author/{author_id}','Author@update_author' );

Route::post('/search-author','Author@search_author' );
Route::post('/tim-kiem-sachtg/','Author@search_a_b' );
Route::get('/show-book-author/{author_id}','Author@show_book_author' );

//Nổi bật
Route::get('/hl-book','BookController@hl_book' );
Route::get('/active-hl-book/{book_id}','BookController@active_hl_book' );
Route::post('/search-hl-book','BookController@search_hl_book' );

Route::get('/hl-auth','Author@hl_auth' );
Route::get('/active-hl-author/{author_id}','Author@active_hl_auth' );
Route::post('/search-hl-author','Author@search_hl_auth' );

//Cart
Route::post('/save-cart','CartController@save_cart' );
Route::post('/add-cart','CartController@add_cart' );
Route::get('/cart-notification','CartController@cart_notification' );
Route::get('/gio-hang/{customer_id}','CartController@show_cart' );
Route::post('/delete-cart','CartController@delete_cart' );
Route::get('/checkout','CartController@checkout' );
Route::get('/them-card/{customer_id}','CartController@add_card' );
Route::get('/chon-dia-chi/{customer_id}','CartController@show_address' );
Route::get('/save-delivery-address/{address_id}/{customer_id}','CartController@save_delivery_address' );

//Order
Route::post('/add-order','CheckOut@add_order' );
Route::get('/dat-hang-thanh-cong/{customer_id}','CheckOut@success_order' );
Route::get('/all-order','CheckOut@all_order' ); //admin
Route::get('/delete-order/{order_id}','CheckOut@delete_order' ); //admin
Route::get('/view-order/{order_id}','CheckOut@view_order' ); //admin
Route::get('/print-order/{checkout_code}','CheckOut@print_order' ); //admin
Route::get('/accept-order/{order_id}','CheckOut@accept_order' ); //admin
Route::get('/being-transported/{order_id}','CheckOut@being_transported' ); //admin
Route::get('/successful-delivery/{order_id}','CheckOut@successful_delivery' ); //admin
Route::get('/revenue','AdminController@revenue' ); //admin
Route::post('/update_order_status','CheckOut@update_order_status' ); //admin

//Đăng nhập
Route::get('/dang-nhap','Customer@user_login' );
Route::post('/add-customer','Customer@add_customer' );
Route::post('/update-customer','Customer@update_customer' );
Route::post('/login-customer','Customer@login_customer' );

//Customer
Route::get('/logout-customer','Customer@logout_customer' );
Route::get('/so-dia-chi/{customer_id}','Customer@customer_address' );
Route::get('/them-dia-chi/{customer_id}','Customer@add_address' );
Route::get('/chinh-sua-dia-chi/{address_id}/{customer_id}','Customer@edit_address' );
Route::get('/delete-address/{address_id}/{customer_id}','Customer@delete_address' );
Route::post('/save-address','Customer@save_address' );
Route::post('/update-address','Customer@update_address' );
Route::get('/thong-tin-tai-khoan/{customer_id}','Customer@profile' );
Route::get('/don-hang-cua-toi/{customer_id}','Customer@my_order' );
Route::get('/chi-tiet-don-hang/{order_id}/{customer_id}','Customer@my_order_detail' );

//News
Route::get('/add-news','Post@add_news' );
Route::post('/save-news','Post@save_news' );
Route::get('/all-news','Post@all_news' );
Route::get('/edit-news/{news_id}','Post@edit_news' );
Route::get('/delete-news/{news_id}','Post@delete_news' );
Route::post('/update-news/{news_id}','Post@update_news' );

//Banner
Route::get('/add-banner','Banner@add_banner' );
Route::post('/save-banner','Banner@save_banner' );
Route::get('/edit-banner/{id}','Banner@edit_banner' );
Route::get('/all-banner','Banner@all_banner' );
Route::get('/delete-banner/{id}','Banner@delete_banner' );

Route::get('/unactive-banner/{id}','Banner@unactive_banner' );
Route::get('/active-banner/{id}','Banner@active_banner' );
Route::post('/update-banner/{id}','Banner@update_banner' );

//About us
Route::get('/all-bb-post','Post@all_bb_post' );
Route::get('/edit-bb-post/{bb_post_id}','Post@edit_bb_post' );
Route::post('/update-bb-post/{bb_post_id}','Post@update_bb_post' );

Route::get('/all-contact','AdminController@contact_us' );
Route::post('/update-web-contact/{company_info_id}','AdminController@update_contact' );
Route::get('/all-company-info','AdminController@company_info' );
Route::post('/update-company-info/{company_info_id}','AdminController@update_company_info' );

