<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;




class CategoryProduct extends Controller
{
    // public function save_category_product(Request $request)
    // {
    //     // Lấy dữ liệu từ request
    //     $data = array();
    //     $data['category_name'] = $request->input('category_product_name');
    //     $data['category_price'] = $request->input('category_product_price');

    //     // Lưu dữ liệu vào cơ sở dữ liệu (giả sử bạn đã có model CategoryProduct)
    //     // CategoryProduct::create([
    //     //     'category_name' => $category_name,
    //     //     'category_desc' => $category_desc,
    //     //     'category_status' => $category_status,
    //     echo '<pre>';
    //     print_r($data);
    //     echo '</pre>';
    //     // ]);
    //     // DB::table('tbl_product')->insert($data);
    //     // echo'Product added successfully';
    //     // return redirect('/')->with('success', 'Category product saved successfully!');
    //     // // Chuyển hướng hoặc trả về phản hồi
    //    // return redirect()->back()->with('success', 'Category product saved successfully!');
    // }
    // public function add_category_product(Request $request){
    //     view('admin.add_category_product');
    // }
} 
