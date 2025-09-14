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
    //hiển thị sản phẩm còn
    public function showDashboard() {
        $all_category_product = DB::table('tbl_product')->get();
        return view('adminLayout', compact('all_category_product'));
    }
    //login
    public function dashboard(Request $request){
        $admin_email = $request->input('admin_email');
        $admin_password = md5($request->input('admin_password'));
        $result = DB::table('admin')
            ->where('admin_email', $admin_email)
            ->where('admin_password', $admin_password)
            ->first();

        if ($result) {
            // Lấy danh sách sản phẩm còn
            $all_category_product = DB::table('tbl_product')->get();
            return view('adminLayout', compact('all_category_product'));
        } else {
            return redirect('/admin')->with('error', 'Sai tài khoản hoặc mật khẩu!');
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
    public function all_category_product(Request $request){
        $all_category_product = DB::table('tbl_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product');
        return view('adminLayout')->with('admin.all_category_product', $manager_category_product);
    }
   //xóa sản phẩm
    public function delete_category_product($id)
    {
        DB::table('tbl_product')->where('category_id', $id)->delete();
        return redirect('/return-admin-dashboard')->with('success', 'Xóa sản phẩm thành công!');
    }

}