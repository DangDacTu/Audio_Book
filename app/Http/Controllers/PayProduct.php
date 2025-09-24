<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;




class payProduct extends Controller
{
    
    public function addToCart($category_id)
    {
        // Lấy sản phẩm từ bảng tbl_product
        $product = DB::table('tbl_product')->where('category_id', $category_id)->first();

        if ($product) {
            // Lưu vào bảng cart_pay
            DB::table('cart_pay')->insert([
                'name' => $product->category_name,
                'price' => $product->category_price,
            ]);
            return redirect('/cart')->with('success', 'Đã thêm vào giỏ hàng!');
        } else {
            return redirect('/home')->with('error', 'Sản phẩm không tồn tại!');
        }
    }
    
    public function cart()
    {
        // Lấy dữ liệu giỏ hàng từ bảng cart_pay
        $cart = DB::table('cart_pay')->get();
        return view('cart', compact('cart'));
    }
    public function deleteCartItem($id)
    {
        DB::table('cart_pay')->where('id', $id)->delete();
        return redirect('/cart')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }
    public function pay()
    {
        $cart = DB::table('cart_pay')->get();
        $total = DB::table('cart_pay')->sum('price');
        return view('pay', compact('cart', 'total'));
    }
}
