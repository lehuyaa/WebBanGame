<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();

class CategoryProduct extends Controller
{
    public function add_category_product(){
    		return view('admin.add_category_product');
    }
    public function all_category_product(){


    		$all_category_product = DB::table('tbl_category_product')->get();
    		$manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
    		return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }

    public function save_category_product(Request $request){
    	$data = array();
    	$data['category_name'] = $request->category_name;
    
    	DB::table('tbl_category_product')->insert($data);
    	return Redirect::to('all-category-product');
    }

    public function edit_category_product($category_product_id){
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }

    public function update_category_product($category_product_id,Request $request){
        $data = array();
        $data['category_name'] = $request->category_name;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        return Redirect::to('all-category-product');
    }

    public function delete_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        return Redirect::to('all-category-product');
    }
    public function show_category_home($category_id){
          $cate_book = DB::table('tbl_category_product')->orderby('category_id')->get();
            $NXB_book = DB::table('table_communication')->orderby('communication_id')->get();
            $category_by_id = DB::table('table_book')->join('tbl_category_product','table_book.category_id','=','tbl_category_product.category_id')->where('table_book.category_id',$category_id)->get();
            $price_game = DB::table('table_book')->orderby('Book_price')->limit(3)->get();
            return view('pages.category.categoryHome')->with('cate_book',$cate_book)->with('NXB_book',$NXB_book)->with('category_by_id',$category_by_id)->with('price_game',$price_game);
           
    }


    
}
