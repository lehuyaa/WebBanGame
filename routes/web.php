<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/store','HomeController@get_store');
Route::post('/search-game','HomeController@search_game');




//admin
Route::get('/admin','AdminController@admin');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@log_out');
Route::get('/all-user','AdminController@all_user');



//Thể Loại Sách
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/the-loai/{category_id}','CategoryProduct@show_category_home');


//Nền Tảng	 
Route::get('/add-NXB','NXBController@add_NXB');
Route::get('/all-NXB','NXBController@all_NXB');
Route::get('/edit-NXB/{communication_id}','NXBController@edit_NXB');
Route::get('/delete-NXB/{communication_id}','NXBController@delete_NXB');
Route::get('/nen-tang/{communication_id}','NXBController@show_NXB_home');


//Chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{Book_id}','BookController@show_Book');

//Sách
Route::get('/add-book','BookController@add_book');
Route::get('/all-game-user','BookController@all_game_user');
Route::get('/all-book','BookController@all_book');
Route::get('/edit-book/{Book_id}','BookController@edit_book');
Route::get('/delete-book/{Book_id}','BookController@delete_book');

//post
Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/save-NXB','NXBController@save_NXB');
Route::post('/save-book','BookController@save_book');


// Giỏ Hàng
Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');


Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');
Route::post('/update-NXB/{NXB_id}','NXBController@update_NXB');
Route::post('/update-book/{Book_id}','BookController@update_book');

//USER
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-user','CheckoutController@add_user');
Route::post('/login-user','CheckoutController@login_user');
Route::get('/order-place','CheckoutController@order_place');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-checkout-user','CheckoutController@save_checkout_user');
Route::get('/register-user','CheckoutController@register_user');
Route::get('/manager-order-user','CheckoutController@manager_order_user');
Route::get('/delete-order-user/{order_id}','CheckoutController@delete_order_user');
Route::get('/view-order-user/{order_id}','CheckoutController@view_order_user');





//Quản lý đơn hàng

Route::get('/manager-order','CheckoutController@manager_order');
Route::get('/view-order/{order_id}','CheckoutController@view_order');
Route::get('/delete-order/{order_id}','CheckoutController@delete_order');
Route::get('/edit-order-status/{order_id}','CheckoutController@edit_order_status');
Route::post('/update-order-status/{order_id}','CheckoutController@update_order_status');




Route::get('/','HomeController@index');
