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
    public function showDashboard()
    {
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
//thêm sản phẩm
    public function save_category_product(Request $request)
    {
        $data = [
            'category_name' => $request->category_product_name,
            'category_price' => $request->category_product_price,
        ];

        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $data['category_image'] = $imageName;
        }

        if ($request->hasFile('category_audio')) {
            $audio = $request->file('category_audio');
            $audioName = time().'_'.$audio->getClientOriginalName();
            $audio->move(public_path('audio'), $audioName);
            $data['category_audio'] = $audioName;
        }

        DB::table('tbl_product')->insert($data);

        return redirect('/product-list')->with('success', 'Thêm sản phẩm thành công!');
    }
    //hiển thị tất cả sản phẩm
    public function all_category_product(Request $request){
        $all_category_product = DB::table('tbl_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product');
        return view('adminLayout')->with('admin.all_category_product', $manager_category_product);
    }
   //xóa sản phẩm
    public function delete_category_product($id)
    {
        DB::table('tbl_product')->where('category_id', $id)->delete();
        return redirect('/product-list')->with('success', 'Xóa sản phẩm thành công!');
    }
    //sửa sản phẩm
    public function edit_category_product($id)
    {
        $product = DB::table('tbl_product')->where('category_id', $id)->first();
        return view('editProduct', compact('product'));
    }
//cập nhật sản phẩm
    public function update_category_product(Request $request, $id)
    {
        $data = [
            'category_name' => $request->category_product_name,
            'category_price' => $request->category_product_price,
        ];

        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $data['category_image'] = $imageName;
        }

        if ($request->hasFile('category_audio')) {
            $audio = $request->file('category_audio');
            $audioName = time().'_'.$audio->getClientOriginalName();
            $audio->move(public_path('audio'), $audioName);
            $data['category_audio'] = $audioName;
        }

        DB::table('tbl_product')->where('category_id', $id)->update($data);

        return redirect()->route('product.list')->with('success', 'Cập nhật sản phẩm thành công!');
    }
    //thống kê doanh thu
    public function revenue()
    {
        // Tính tổng doanh thu từ bảng library (sản phẩm đã bán)
        $totalRevenue = DB::table('library')
            ->join('tbl_product', 'library.product_id', '=', 'tbl_product.category_id')
            ->sum('tbl_product.category_price');

        // Lấy danh sách sản phẩm đã bán (nếu muốn hiển thị chi tiết)
        $soldProducts = DB::table('library')
            ->join('tbl_product', 'library.product_id', '=', 'tbl_product.category_id')
            ->select('tbl_product.category_name', 'tbl_product.category_price', 'library.created_at')
            ->get();

        return view('admin.revenue', compact('totalRevenue', 'soldProducts'));
    }
}