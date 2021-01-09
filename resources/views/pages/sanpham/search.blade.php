@extends('layout')
@section('content')
<div class="features_items">
  <!--features_items-->
  <h2 class="title text-center">Kết quả tìm kiếm</h2>
  @foreach ($search_result as $key => $result)
  <a href="{{URL::to('/chi-tiet-san-pham/' . $result->product_id)}}">
    <div class="col-sm-4">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{URL::to('public/uploads/product/'.$result->product_image)}}" alt="" />
            <h2>{{number_format($result->product_price) . ' VND'}}</h2>
            <p>{{$result->product_name}}</p>
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
@endsection