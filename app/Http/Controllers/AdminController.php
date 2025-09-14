<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
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
        $result = DB::table('admin')
        ->where('admin_email', $admin_email)
        ->where('admin_password', $admin_password)
        ->first();
        if($result){
            return view('admin.dashboard');
        }else{
            echo 'sai mat khau';
            return view('adminLogin');

        }
        
    }
    //logout
    public function logout(){
        return view('adminLogin');
    }

    public function save_category_product(Request $request){
        $data = array();
        $data['category_name'] = $request->input('category_product_name');
        $data['category_price'] = $request->input('category_product_price');

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        DB::table('tbl_product')->insert($data);
        echo 'Product added successfully';
        return redirect('/return-admin-dashboard')->with('success', 'Category product saved successfully!');
    }

}