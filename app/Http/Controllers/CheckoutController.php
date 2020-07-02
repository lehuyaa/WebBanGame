<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();
use Cart;
class CheckoutController extends Controller
{
    public function login_checkout(){


    	$cate_book = DB::table('tbl_category_product')->orderby('category_id')->get();
    	$communication_book = DB::table('table_communication')->orderby('communication_id')->get();
    	return view('pages.login_user')->with('cate_book',$cate_book)->with('communication_book',$communication_book);
    }

    public function register_user(){
        return view('pages.register_user');
    }


    public function add_user(Request $request){

    	$data = array();
    	$data['user_name'] = $request->user_name;
    	$data['user_password'] = $request->user_password;
    	$data['user_email'] = $request->user_email;
    	$data['user_phone'] = $request->user_phone;


    	$user_id = DB::table('table_user')->insertGetId($data);



    	Session::put('user_id',$user_id);
    	Session::put('name',$request->user_name);
    	
    

    	return Redirect('/');

    }

    public function checkout(){

    		$cate_book = DB::table('tbl_category_product')->orderby('category_id')->get();
            $communication_book = DB::table('table_communication')->orderby('communication_id')->get();
    		return view('pages.checkout.show_checkout')->with('cate_book',$cate_book)->with('communication_book',$communication_book);
    
    }

    public function save_checkout_user(Request $request){


    	$data = array();
    	$data['ship_name'] = $request->ship_name;
    	$data['ship_address'] = $request->ship_address;
    	$data['ship_phone'] = $request->ship_phone;
    	
    	$ship_id = DB::table('table_ship')->insertGetId($data);

    	Session::put('ship_id',$ship_id);
    	

    	return Redirect('/payment');
    }

    public function logout_checkout(){
    	Session::flush();
    	return Redirect('/');
    }


    public function login_user(Request $request){
    	$email = $request->email_account;
    	$password = $request->password_account;

    	$result = DB::table('table_user')->where('user_email',$email)->where('user_password',$password)->first();


    	if ($result) {
    		Session::put('user_id',$result->user_id);

    		Session::put('name',$result->user_name);
    		return Redirect::to('/');
    	}else{
        Session::put('message','Tài Khoản Hoặc Mật Khẩu Sai');
    	   return Redirect::to('/login-checkout');
    	}
    }
    public function payment(){
    	$cate_book = DB::table('tbl_category_product')->orderby('category_id')->get();
    	 $communication_book = DB::table('table_communication')->orderby('communication_id')->get();
    	return view('pages.checkout.payment')->with('cate_book',$cate_book)->with('communication_book',$communication_book);
    }

    public function order_place(){

          $content = Cart::content();

        //Lấy đơn hàng
      
        $order_data = array();
        $order_data['user_id'] = Session::get('user_id');
        $order_data['ship_id'] = Session::get('ship_id');
        $order_data['order_total'] = Cart::subtotal();
        $order_data['created_time'] =new \DateTime();

        $order_data['order_status_id'] = 1;
        
        $order_id = DB::table('table_order')->insertGetId($order_data);


        //Lấy chi tiết đơn hàng

      
        foreach ($content as $key => $v_content) {
            $order_d_data = array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['Book_id'] = $v_content->id;
            $order_d_data['Book_quantity'] = $v_content->qty;

           
            $order_d_id = DB::table('table_order_details')->insertGetId($order_d_data);
        }
        
        
        $cate_book = DB::table('tbl_category_product')->orderby('category_id')->get();
        $communication_book = DB::table('table_communication')->orderby('communication_id')->get();
        return view('pages.checkout.handcash')->with('cate_book',$cate_book)->with('communication_book',$communication_book);
    }

    public function manager_order_user(){
        $user_id = Session::get('user_id');
        $all_order = DB::table('table_order')
                    ->join('table_user','table_order.user_id','=','table_user.user_id')
                    ->join('table_order_status','table_order.order_status_id','=','table_order_status.order_status_id')->where('table_order.user_id',$user_id)
                    ->orderby('order_id','desc')
                    ->get();
          
            return view('pages.user.manager_order_user')->with('all_order',$all_order);

    }   

    public function manager_order(){
        $all_order = DB::table('table_order')
                    
                    ->join('table_user','table_order.user_id','=','table_user.user_id')
                    ->join('table_order_status','table_order.order_status_id','=','table_order_status.order_status_id')
                    
                    ->get();
          
             $manager_order = view('admin.manager_order')->with('all_order',$all_order);
            return view('admin_layout')->with('admin.manager_order',$manager_order);

    }

    public function view_order($order_id){
         $order_by_id = DB::table('table_order')
        ->join('table_user','table_order.user_id','=','table_user.user_id')
        ->join('table_ship','table_order.ship_id','=','table_ship.ship_id')
        ->join('table_order_details','table_order.order_id','=','table_order_details.order_id')
        ->join('table_book','table_order_details.Book_id','=','table_book.Book_id')
        ->where('table_order.order_id',$order_id)
        ->get();
            $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
            return view('admin_layout')->with('admin.view_order',$manager_order_by_id);
    }

    public function view_order_user($order_id){

         $order_by_id = DB::table('table_order')
        ->join('table_user','table_order.user_id','=','table_user.user_id')
        ->join('table_ship','table_order.ship_id','=','table_ship.ship_id')
        ->join('table_order_details','table_order.order_id','=','table_order_details.order_id')
        ->join('table_book','table_order_details.Book_id','=','table_book.Book_id')
        ->where('table_order.order_id',$order_id)
        ->get();
            return view('pages.user.view_order_user')->with('order_by_id',$order_by_id);
    }

     public function edit_order_status($order_id){
        $edit_order_status = DB::table('table_order')->where('order_id',$order_id)->get();
        $order_status = DB::table('table_order_status')->orderby('order_status_id')->get();
        $manager_order_status = view('admin.edit_order_status')->with('edit_order_status',$edit_order_status)->with('order_status',$order_status);
        return view('admin_layout')->with('admin.edit_order_status',$manager_order_status);
       
    }
     public function update_order_status($order_id,Request $request){
        $data = array();
        $data['order_status_id'] = $request->order_status_id;
        DB::table('table_order')->where('order_id',$order_id)->update($data);
        return Redirect::to('manager-order');
    }

    public function delete_order($order_id){
         
     
        DB::table('table_order')->where('order_id',$order_id)->delete();
        DB::table('table_order_details')->where('order_id',$order_id)->delete();
       
        return Redirect::to('manager-order');
    }

    public function delete_order_user($order_id){
         
     
        DB::table('table_order')->where('order_id',$order_id)->delete();
        DB::table('table_order_details')->where('order_id',$order_id)->delete();
       
        return Redirect::to('manager-order-user');
    }
}
 