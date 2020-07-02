<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();

class BookController extends Controller
{
    public function add_book(){
    		$cate_book = DB::table('tbl_category_product')->orderby('category_id')->get();
    		$NXB_book = DB::table('table_communication')->orderby('communication_id')->get();
    		return view('admin.add_book')->with('cate_book',$cate_book)->with('NXB_book',$NXB_book);
    }

    public function all_book(){
        $all_book = DB::table('table_book')
        ->join('tbl_category_product','tbl_category_product.category_id','=','table_book.category_id')
        ->join('table_communication','table_communication.communication_id','=','table_book.communication_id')
        ->orderby('table_book.Book_id')->get();
            $manager_book = view('admin.all_book')->with('all_book',$all_book);
            return view('admin_layout')->with('admin.all_book',$manager_book);
    }

    public function all_game_user(){
        $all_game_user = DB::table('table_book')
        
        ->join('tbl_category_product','tbl_category_product.category_id','=','table_book.category_id')
        ->join('table_communication','table_communication.communication_id','=','table_book.communication_id')
        ->orderby('table_book.Book_id')->get();
         $cate_book = DB::table('tbl_category_product')->orderby('category_id')->get();
        $NXB_book = DB::table('table_communication')->orderby('communication_id')->get();
            $price_game = DB::table('table_book')->orderby('Book_price')->limit(3)->get();
            return view('pages.all_game_user')->with('all_game_user',$all_game_user)->with('cate_book',$cate_book)->with('NXB_book',$NXB_book)->with('price_game',$price_game);
    }


    public function save_book(Request $request){
    		$data = array();
    		$data['Book_name'] = $request->Book_name;
    		$data['Book_desc'] = $request->Book_desc;
    		$data['Book_content'] = $request->Book_content;
    		$data['Book_price'] = $request->Book_price;
    		$data['Book_status'] = $request->Book_status;
    		$data['category_id'] = $request->cate;
    		$data['communication_id'] = $request->NXB_book;
           
            
            
    		$get_image = $request->file('Book_image');

    		if ($get_image) {
    		$get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploadimage',$new_image);
            $data['Book_image'] = $new_image;
         	DB::table('table_book')->insert($data);
            return Redirect::to('all-book');
    		}
    		$data['Book_image'] = '';


            if ($data['Book_name']==NULL || $data['Book_desc']==NULL || $data['Book_content']==NULL ||$data['Book_price']==NULL || $data['Book_status']==NULL   ){
                Session::put('message_add_book','Hãy Thêm Đầy Đủ');
                return Redirect::to('add-book');
            }else{
                DB::table('table_book')->insert($data);
                return Redirect::to('all-book');
            }
    			
    	
    }

    public function edit_book($Book_id){

    	$cate_book = DB::table('tbl_category_product')->orderby('category_id')->get();
    	$NXB_book = DB::table('table_communication')->orderby('communication_id')->get();
    	$edit_book = DB::table('table_book')->where('Book_id',$Book_id)->get();
        $manager_book = view('admin.edit_book')->with('edit_book',$edit_book)->with('cate_book',$cate_book)->with('NXB_book',$NXB_book);
        return view('admin_layout')->with('admin.edit_book',$manager_book);
    }

    public function update_book($Book_id,Request $request){
    		 $data = array();
            $data['Book_name'] = $request->Book_name;
            $data['Book_desc'] = $request->Book_desc;
            $data['Book_content'] = $request->Book_content;
            $data['Book_price'] = $request->Book_price;
            $data['Book_status'] = $request->Book_status;
            $data['category_id'] = $request->cate;
            $data['communication_id'] = $request->NXB_book;
            
            
            $get_image = $request->file('Book_image');
        
        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploadimage',$new_image);
                    $data['Book_image'] = $new_image;
                    DB::table('table_book')->where('Book_id',$Book_id)->update($data);
        
                    return Redirect::to('all-book');
        }
            
        DB::table('table_book')->where('Book_id',$Book_id)->update($data);
        
        return Redirect::to('all-book');
    }

      public function delete_book($Book_id){
        DB::table('table_book')->where('Book_id',$Book_id)->delete();
        return Redirect::to('all-book');
    }
     

      public function show_Book($Book_id){

            $cate_book = DB::table('tbl_category_product')->orderby('category_id')->get();
            $NXB_book = DB::table('table_communication')->orderby('communication_id')->get();
             $new_game = DB::table('table_book')->orderby('Book_id','desc')->limit(4)->get();
            $show_book = DB::table('table_book')
            ->join('tbl_category_product','tbl_category_product.category_id','=','table_book.category_id')
            ->join('table_communication','table_communication.communication_id','=','table_book.communication_id')
            ->where('table_book.Book_id',$Book_id)->get();



            foreach ($show_book as $key => $value) {
                $category_id = $value->category_id;
            }


            $relate_book = DB::table('table_book')
            ->join('tbl_category_product','tbl_category_product.category_id','=','table_book.category_id')
            ->join('table_communication','table_communication.communication_id','=','table_book.communication_id')
            ->where('tbl_category_product.category_id',$category_id)->whereNotIn('table_book.Book_id',[$Book_id])->get();

            $price_game = DB::table('table_book')->orderby('Book_price')->limit(3)->get();

            return view('pages.game.show_game')->with('cate_book',$cate_book)->with('NXB_book',$NXB_book)->with('show_book',$show_book)->with('relate_book',$relate_book)->with('price_game',$price_game)->with('new_game',$new_game);


      }
}
