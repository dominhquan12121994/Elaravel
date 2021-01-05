@extends('layout')
@section('content')
<div class="features_items">
  <!--features_items-->
  <h2 class="title text-center">Sản phẩm mới nhất</h2>
  @foreach ($all_product as $key => $all_product)
  <a href="{{URL::to('/chi-tiet-san-pham/' . $all_product->product_id)}}">
    <div class="col-sm-4">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{URL::to('public/uploads/product/'.$all_product->product_image)}}" alt="" />
            <!-- <h2>{{$all_product->product_price}}</h2> -->
            <h2>{{number_format($all_product->product_price) . ' VND'}}</h2>
            <p>{{$all_product->product_name}}</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
          </div>
        </div>
        <div class="choose">
          <ul class="nav nav-pills nav-justified">
            <li>
              <a href="#"><i class="fa fa-plus-square"></i>Thêm yêu thích</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-plus-square"></i>Thêm so sánh</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </a>
  @endforeach
  <!-- </div>
features_items -->
  @endsection