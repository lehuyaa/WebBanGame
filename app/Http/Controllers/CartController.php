<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();
use Cart;

class CartController extends Controller
{
    public function save_cart(Request $request){
    	$BookID = $request->productid_hidden;
    	$quanlity = $request->qty;


    	$cate_book = DB::table('tbl_category_product')->orderby('category_id')->get();
      $communication_game = DB::table('table_communication')->orderby('communication_id')->get();
      $new_game = DB::table('table_book')->orderby('Book_id','desc')->limit(4)->get();

    	$Book_infor = DB::table('table_book')->where('Book_id',$BookID)->first();

      $data['id'] = $Book_infor->Book_id;
      $data['qty'] = $quanlity;
      $data['name'] = $Book_infor->Book_name;
      $data['price'] = $Book_infor->Book_price;
      $data['weight'] = '90';
      $data['options']['image'] = $Book_infor->Book_image;

      Cart::add($data);


    	return view('pages.cart.cart')->with('cate_book',$cate_book)->with('communication_game',$communication_game)->with('new_game',$new_game);;	
    }

    public function show_cart(){
      $cate_book = DB::table('tbl_category_product')->orderby('category_id')->get();
      $communication_game = DB::table('table_communication')->orderby('communication_id')->get();
      $new_game = DB::table('table_book')->orderby('Book_id','desc')->limit(4)->get();
        return view('pages.cart.cart')->with('cate_book',$cate_book)->with('communication_game',$communication_game)->with('new_game',$new_game); 
    }

    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }

  public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
}
