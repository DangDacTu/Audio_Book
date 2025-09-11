<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function index()
    {
        return view("adminLogin");
    }
    public function showDashboard(){
        return view("admin.dashboard");
    }
    //login
    public function dashboard(Request $request){
        $admin_email = $request->input('admin_email');
        $admin_password = md5($request->input('admin_password'));
        $result = DB::table('admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if($result){
            return view('admin.dashboard');
        }else{
            return view('adminLogin');
        }
        
    }
    //logout
    public function logout(){
        
        
    }

}