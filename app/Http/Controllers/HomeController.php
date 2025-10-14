<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = DB::table('tbl_product')->get();
        return view('pages.home', compact('products'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = DB::table('tbl_product')
            ->where('category_name', 'like', '%' . $keyword . '%')
            ->get();
        return view('pages.home', compact('products', 'keyword'));
    }
    public function library()
    {
        $user_id = session('user_id');
        $library = DB::table('library')
            ->join('tbl_product', 'library.product_id', '=', 'tbl_product.category_id')
            ->where('library.user_id', $user_id)
            ->select('tbl_product.*')
            ->get();

        return view('library', compact('library'));
    }
    public function deleteLibrary($id)
    {
        $user_id = session('user_id');
        DB::table('library')->where('user_id', $user_id)->where('product_id', $id)->delete();
        return redirect()->route('library')->with('success', 'Đã xóa sản phẩm khỏi thư viện!');
    }
    public function listening(Request $request)
    {
        $id = $request->query('id');
        $book = DB::table('tbl_product')->where('category_id', $id)->first();
        if (!$book) {
            abort(404);
        }
        return view('listening', compact('book'));
    }
}
