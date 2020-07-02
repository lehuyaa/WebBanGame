<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();


class AdminController extends Controller
{
    public function admin(){
        return view('admin_login');
    }
    public function show_dashboard(){
    	return view('admin.dashboard');
    }
    public function log_out(){
    	return view('admin_login');
    }

    public function dashboard(Request $request){
    	$admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = DB::table('table_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();


        if ($result) {
            Session::put('admin_id',$result->admin_id);

            Session::put('admin_name',$result->admin_name);
            return Redirect::to('/dashboard');
        }else{
        Session::put('message_admin','Tài Khoản Hoặc Mật Khẩu Sai');
           return Redirect::to('/admin');
        }
    }
    public function all_user(){
        $all_user = DB::table('table_user')->orderby('table_user.user_id')->get();
        $manager_user = view('admin.all_user')->with('all_user',$all_user);
        return view('admin_layout')->with('admin.all_user',$manager_user);
    }
}
