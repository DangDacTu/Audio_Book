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
}
