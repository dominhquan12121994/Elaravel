<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Redirect;

class CartController extends Controller
{
    public function save_cart(Request $request) {
      $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '1')
        ->orderby('category_id', 'desc')
        ->get();
      $brand_product = DB::table('tbl_brand_product')
        ->where('brand_status', '1')
        ->orderby('brand_id', 'desc')
        ->get();
      $product_id = $request->productid_hidden;
      $quantity = $request->qty;
      $product_info = DB::table('tbl_product')
        ->where('product_id', '=', $product_id)
        ->first();
      // Cart::add('293ad', 'Product 1', 1, 9.99);
      // Cart::destroy();
      $data['id'] = $product_info->product_id;
      $data['qty'] = $quantity;
      $data['name'] = $product_info->product_name;
      $data['price'] = $product_info->product_price;
      $data['weight'] = $product_info->product_price;
      $data['options']['image'] = $product_info->product_image;
      Cart::add($data);
      // Cart::destroy();
      return Redirect::to('/show-cart');
    }

    public function show_cart() {
      $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '1')
        ->orderby('category_id', 'desc')
        ->get();
      $brand_product = DB::table('tbl_brand_product')
        ->where('brand_status', '1')
        ->orderby('brand_id', 'desc')
        ->get();
      return view('pages.cart.show_cart')
        ->with('category', $cate_product)
        ->with('brand', $brand_product);
    }

    public function delete_to_cart($row_id) {
      Cart::update($row_id, 0);
      return Redirect::to('/show-cart');
    }

    public function update_cart_quantity(Request $request) {
      $row_id = $request['rowId_cart'];
      $qty = $request['cart_quantity'];
      Cart::update($row_id, $qty);
      return Redirect::to('/show-cart');
    }
}
