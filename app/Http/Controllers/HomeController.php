<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();


class HomeController extends Controller
{

	public function index(){


    	$cate_book = DB::table('tbl_category_product')->orderby('category_id')->get();
    	$NXB_book = DB::table('table_communication')->orderby('communication_id')->get();

        $hot_game_big = DB::table('table_book')->inRandomOrder()->limit(2)->get();
        $hot_game_small = DB::table('table_book')->inRandomOrder()->limit(4)->get();

    	$random_game = DB::table('table_book')->inRandomOrder()->limit(10)->get();
    	$new_game = DB::table('table_book')->orderby('Book_id','desc')->limit(4)->get();
        $new_game_first=DB::table('table_book')->orderby('Book_id','desc')->limit(2)->get();
        $price_game = DB::table('table_book')->orderby('Book_price')->limit(6)->get();
    	$all_book = DB::table('table_book')->orderby('Book_id')->get();
    	return view('welcome')->with('cate_book',$cate_book)->with('NXB_book',$NXB_book)->with('new_game',$new_game)->with('all_book',$all_book)->with('random_game',$random_game)->with('price_game',$price_game)->with('new_game_first',$new_game_first)->with('hot_game_big',$hot_game_big)->with('hot_game_small',$hot_game_small);
    }


    public function search_game(Request $request){


        $keywords = $request->keywords_submit;
       $cate_book = DB::table('tbl_category_product')->orderby('category_id')->get();
        $NXB_book = DB::table('table_communication')->orderby('communication_id')->get();
            $price_game = DB::table('table_book')->orderby('Book_price')->limit(3)->get();

        $search_game= DB::table('table_book')->where('Book_name','like','%'.$keywords.'%')->orWhere('Book_desc','like','%'.$keywords.'%')->orWhere('Book_status','like','%'.$keywords.'%')->get();
        
        

        return view('pages.game.search')->with('cate_book',$cate_book)->with('NXB_book',$NXB_book)->with('search_game',$search_game)->with('price_game',$price_game);
    }


    public function get_store(){
        return view('store');
    }
}
