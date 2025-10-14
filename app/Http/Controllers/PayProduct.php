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
                'product_id' => $product->category_id,
                'name' => $product->category_name,
                'price' => $product->category_price,
                'image' => $product->category_image,
            ]);
            // Chuyển về trang home thay vì cart
            return redirect('/home')->with('success', 'Đã thêm vào giỏ hàng!');
        } else {
            return redirect('/home')->with('error', 'Sản phẩm không tồn tại!');
        }
    }
    
    public function cart()
    {
        $cart = DB::table('cart_pay')->get();
        $total = DB::table('cart_pay')->sum('price');
        return view('cart', compact('cart', 'total'));
    }
    public function deleteCartItem($id)
    {
        DB::table('cart_pay')->where('id', $id)->delete();
        return redirect('/cart')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }
    public function pay()
    {
        $user_id = session('user_id');
        $cart = DB::table('cart_pay')->get();
/*
        foreach ($cart as $item) {
            DB::table('library')->insert([
                'user_id' => $user_id,
                'product_id' => $item->id,
            ]);
        }
        DB::table('cart_pay')->where('user_id', $user_id)->delete();
*/
        return redirect('/library')->with('success', 'Thanh toán thành công, sản phẩm đã được thêm vào thư viện!');
    }
    public function payMomo()
    {
        $cart = DB::table('cart_pay')->get();
        $total = DB::table('cart_pay')->sum('price');
        return view('payMomo', compact('cart', 'total'));
    }

    public function paymentVnpay(Request $request)
    {
        $vnp_TmnCode = "7X004TMH"; // Mã website của bạn
        $vnp_HashSecret = "EBQWDQA6WLNYXBXCS1KAKUW98J60UMEO"; // Chuỗi bí mật
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html"; // URL thanh toán
        //$vnp_ReturnUrl = url('/library'); // URL trả về

        $vnp_ReturnUrl = url('/payment/vnpay/return'); // URL trả về

        $vnp_TxnRef = time(); // Mã đơn hàng (unique)
        $vnp_OrderInfo = "Thanh toan don hang";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = DB::table('cart_pay')->sum('price') * 100; // nhân 100 theo chuẩn VNPAY
        $vnp_Locale = 'vn';
        $vnp_IpAddr = $request->ip();

        $inputData = array(
            "vnp_Version"   => "2.1.0",
            "vnp_TmnCode"   => $vnp_TmnCode,
            "vnp_Amount"    => $vnp_Amount,
            "vnp_Command"   => "pay",
            "vnp_CreateDate"=> date('YmdHis'),
            "vnp_CurrCode"  => "VND",
            "vnp_IpAddr"    => $vnp_IpAddr,
            "vnp_Locale"    => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef"    => $vnp_TxnRef,
        );

        // Sắp xếp tham số theo thứ tự alphabet
        ksort($inputData);
        $query = "";
        $i = 0;
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $query .= '&';
            }
            $query .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }

        // Tạo chữ ký
        $vnpSecureHash = hash_hmac('sha512', $query, $vnp_HashSecret);

        // Ghép URL + chữ ký
        $vnp_Url = $vnp_Url . "?" . $query . '&vnp_SecureHash=' . $vnpSecureHash;

        // Redirect sang cổng thanh toán
        return redirect($vnp_Url);
    }
    public function libraryAfterPayment(Request $request)
    {
        $user_id = session('user_id');
        // Kiểm tra trạng thái thanh toán từ VNPAY
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        if ($vnp_ResponseCode == '00') { // 00 là thanh toán thành công
            $cart = DB::table('cart_pay')->get();
            foreach ($cart as $item) {
                DB::table('library')->insert([
                    'user_id' => $user_id,
                    'product_id' => $item->product_id,
                ]);
            }
            DB::table('cart_pay')->delete();
            $library = DB::table('library')
                ->join('tbl_product', 'library.product_id', '=', 'tbl_product.category_id')
                ->where('library.user_id', operator: $user_id)
                ->select('tbl_product.*')
                ->get();
            return view('library', compact('library'))->with('success', 'Thanh toán thành công, sản phẩm đã được thêm vào thư viện!');
        } else {
            return redirect('/cart')->with('error', 'Thanh toán thất bại hoặc bị hủy!');
        }
    }
}
