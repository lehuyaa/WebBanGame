<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();

class NXBController extends Controller
{
    public function add_NXB(){
    	return view('admin.add_NXB');
    }
    public function all_NXB(){
    		$all_NXB = DB::table('table_communication')->get();
    		$manager_NXB = view('admin.all_NXB')->with('all_NXB',$all_NXB);
    		return view('admin_layout')->with('admin.all_NXB',$manager_NXB);
    }
    public function save_NXB(Request $request){
    	$data = array();
    	$data['communication_name'] = $request->communication_name;

            $get_image = $request->file('communnication_image');

            if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploadimage',$new_image);
            $data['communication_image'] = $new_image;
            DB::table('table_communication')->insert($data);
            return Redirect::to('all-NXB');
            }
            $data['communication_image'] = '';
                DB::table('table_communication')->insert($data);
                return Redirect::to('all-NXB');
    }
     public function edit_NXB($communication_id){
        $edit_NXB = DB::table('table_communication')->where('communication_id',$communication_id)->get();
        $manager_NXB = view('admin.edit_NXB')->with('edit_NXB',$edit_NXB);
        return view('admin_layout')->with('admin.edit_NXB',$manager_NXB);
    }

    public function update_NXB($communication_id,Request $request){
        $data = array();
        $data['communication_name'] = $request->communication_name;
        DB::table('table_communication')->where('communication_id',$communication_id)->update($data);
        return Redirect::to('all-NXB');
    }
      public function delete_NXB($communication_id){
        DB::table('table_communication')->where('communication_id',$communication_id)->delete();
        return Redirect::to('all-NXB');
    }


    public function show_NXB_home($communication_id){
            $cate_book = DB::table('tbl_category_product')->orderby('category_id')->get();
            $NXB_book = DB::table('table_communication')->orderby('communication_id')->get();
            $NXB_by_id = DB::table('table_book')->join('table_communication','table_book.communication_id','=','table_communication.communication_id')->where('table_book.communication_id',$communication_id)->get();
            
            $price_game = DB::table('table_book')->orderby('Book_price')->limit(3)->get();
            return view('pages.communication.communicationHome')->with('cate_book',$cate_book)->with('NXB_book',$NXB_book)->with('NXB_by_id',$NXB_by_id)->with('price_game',$price_game);
    }
}





/*//Lấy thông tin từ bảng 'user'
$all_user = DB::table('table_user')->orderby('table_user.user_id')->get();



        //Lấy thông tin từ bảng 'game' được nối với bảng 'thể loại' và bảng 'nền tàng'
        $all_game = DB::table('table_game')
        ->join('tbl_category_product','tbl_category_product.category_id','=','table_game.category_id')
        ->join('table_communication','table_communication.communication_id','=','table_game.communication_id')
        ->orderby('table_game.Game_id')->get();



        DB::table('table_game')->insert($data);


        //update bảng 'table_game' với cột có id =  $Game_id 
        DB::table('table_game')->where('Game_id',$Game_id)->update($data);


        //xóa cột có id = $Game_id
        DB::table('table_game')->where('Game_id',$Game_id)->delete();


        //Lấy dữ liệu từ bảng 'nền tảng'
        $all_NPH = DB::table('table_communication')->get();

        //Lấy dữ liệu từ bảng 'thể loại'
        $all_category_product = DB::table('tbl_category_product')->get();



        //Thêm vào bảng 'nền tảng'
        $data = array();
        $data['communication_name'] = $request->communication_name;
        DB::table('table_communication')->insert($data);
        
        //Thêm vào bảng 'thể loại'
        $data = array();
        $data['category_name'] = $request->category_name;
        DB::table('tbl_category_product')->insert($data);

        //Update vào cột có id = $communication_id   
        $data = array();
        $data['communication_name'] = $request->communication_name;
        DB::table('table_communication')->where('communication_id',$communication_id)->update($data);

        //Update vào cột có id = $category_product_id
        $data = array();
        $data['category_name'] = $request->category_name;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);

        //Xóa cột có id = $communication_id
        DB::table('table_communication')->where('communication_id',$communication_id)->delete();

        //Xóa cột có id = $category_product_id
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();



        //Thêm dữ liệu vào bảng'table_gamne
        $data = array();
            $data['Game_name'] = $request->Game_name;
            $data['Game_desc'] = $request->Game_desc;
            $data['Game_content'] = $request->Game_content;
            $data['Game_price'] = $request->Game_price;
            $data['Game_status'] = $request->Game_status;
            $data['category_id'] = $request->cate;
            $data['communication_id'] = $request->NPH_game;
           
            
            
            $get_image = $request->file('Game_image');

            if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploadimage',$new_image);
            $data['Game_image'] = $new_image;
            DB::table('table_game')->insert($data);
            return Redirect::to('all-game');
            }
            $data['Game_image'] = '';
                DB::table('table_game')->insert($data);




                // Lấy thông tin từ bảng 'order'
                $all_order = DB::table('table_order')
                    ->join('table_user','table_order.user_id','=','table_user.user_id')
                    ->join('table_order_status','table_order.order_status_id','=','table_order_status.order_status_id')
                    ->get();


                // Lấy thông tin từ bảng 'order_details'
                $order_by_id = DB::table('table_order')
                ->join('table_user','table_order.user_id','=','table_user.user_id')
                ->join('table_ship','table_order.ship_id','=','table_ship.ship_id')
                ->join('table_order_details','table_order.order_id','=','table_order_details.order_id')
                ->join('table_game','table_order_details.Game_id','=','table_game.Game_id')
                ->where('table_order.order_id',$order_id)
                ->get();



                //Update cột có id = $order_id
                $data = array();
                $data['order_status_id'] = $request->order_status_id;
                DB::table('table_order')->where('order_id',$order_id)->update($data);


                //Xóa cột có id = id = $order_id
                DB::table('table_order')->where('order_id',$order_id)->delete();
                DB::table('table_order_details')->where('order_id',$order_id)->delete();




                // Lấy dữ liệu từ bảng 'game' với các yêu cầu khác nhau

                // Các Game đang hot
                $hot_game_big = DB::table('table_game')->inRandomOrder()->limit(2)->get();
                $hot_game_small = DB::table('table_game')->inRandomOrder()->limit(4)->get();
                
                // Game Ngẫu Nhiên
                $random_game = DB::table('table_game')->inRandomOrder()->limit(10)->get();

                //Game mới ra
                $new_game = DB::table('table_game')->orderby('Game_id','desc')->limit(4)->get();
                $new_game_first=DB::table('table_game')->orderby('Game_id','desc')->limit(2)->get();

                //Game giá rẻ nhất
                $price_game = DB::table('table_game')->orderby('Game_price')->limit(6)->get();

                //Tất cả game
                $all_game = DB::table('table_game')->orderby('Game_id')->get();





                //các thể loại game
                $cate_game = DB::table('tbl_category_product')->orderby('category_id')->get();

                //các nền tảng
                $NPH_game = DB::table('table_communication')->orderby('communication_id')->get();





                //game cùng thể loại
                $category_by_id = DB::table('table_game')->join('tbl_category_product','table_game.category_id','=','tbl_category_product.category_id')->where('table_game.category_id',$category_id)->get();


                //game cùng nền tảng
                $NPH_by_id = DB::table('table_game')->join('table_communication','table_game.communication_id','=','table_communication.communication_id')->where('table_game.communication_id',$communication_id)->get();



                $show_game = DB::table('table_game')
                ->join('tbl_category_product','tbl_category_product.category_id','=','table_game.category_id')
                ->join('table_communication','table_communication.communication_id','=','table_game.communication_id')
                ->where('table_game.Game_id',$Game_id)->get();



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



        $data = array();
        $data['user_name'] = $request->user_name;
        $data['user_password'] = $request->user_password;
        $data['user_email'] = $request->user_email;
        $data['user_phone'] = $request->user_phone;


        $user_id = DB::table('table_user')->insertGetId($data);







         //Lấy thông tin người nhận
        $data = array();
        $data['ship_name'] = $request->ship_name;
        $data['ship_address'] = $request->ship_address;
        $data['ship_phone'] = $request->ship_phone;
        
        $ship_id = DB::table('table_ship')->insertGetId($data);

        Session::put('ship_id',$ship_id);


        //Lấy thông tin từ giỏ hàng
        $content = Cart::content();


        //Lấy đơn hàng
        $order_data = array();
        $order_data['user_id'] = Session::get('user_id');
        $order_data['ship_id'] = Session::get('ship_id');
        $order_data['order_total'] = Cart::subtotal();// tổng giá trong giỏ hàng
        $order_data['created_time'] =new \DateTime();
        $order_data['order_status_id'] = 1;
        $order_id = DB::table('table_order')->insertGetId($order_data);


        //Lấy chi tiết đơn hàng
        foreach ($content as $key => $v_content) {
            $order_d_data = array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['Game_id'] = $v_content->id;
            $order_d_data['Game_quantity'] = $v_content->qty;
            $order_d_id = DB::table('table_order_details')->insertGetId($order_d_data);
        }*/


