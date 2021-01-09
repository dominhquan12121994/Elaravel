<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    //
    public function index() {
      $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '1')
        ->orderby('category_id', 'desc')
        ->get();
      $brand_product = DB::table('tbl_brand_product')
        ->where('brand_status', '1')
        ->orderby('brand_id', 'desc')
        ->get();
      $all_product = DB::table('tbl_product')
        ->where('product_status', '1')
        ->orderby('product_id', 'desc')
        ->limit(6)
        ->get();
      return view('pages.home')
        ->with('category', $cate_product)
        ->with('brand', $brand_product)
        ->with('all_product', $all_product);
    }

    public function search(Request $request) {
      $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '1')
        ->orderby('category_id', 'desc')
        ->get();
      $brand_product = DB::table('tbl_brand_product')
        ->where('brand_status', '1')
        ->orderby('brand_id', 'desc')
        ->get();
      $search_content = $request->search_content;
      $search_result = DB::table('tbl_product')
        ->where('tbl_product.product_name', 'like', '%' . $search_content . '%')
        // ->paginate(2);
        ->get();
      return view('pages.sanpham.search')
        ->with('category', $cate_product)
        ->with('brand', $brand_product)
        ->with('search_result', $search_result);
    }
}
