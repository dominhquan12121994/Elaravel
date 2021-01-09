@extends('layout')
@section('content')
@foreach ($details_product as $key => $details_product)
<div class="product-details">
  <!--product-details-->
  <div class="col-sm-5">
    <div class="view-product">
      <img src="{{URL::asset('public/uploads/product/' . $details_product->product_image)}}" alt="" />
      <h3>Phóng to</h3>
    </div>
    <!-- <div id="similar-product" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active">
          <a href=""><img width="50px" height="50px" src="{{URL::asset('public/uploads/product/' . $details_product->product_image)}}" alt="" /></a>
          <a href=""><img width="50px" height="50px" src="{{URL::asset('public/uploads/product/' . $details_product->product_image)}}" alt="" /></a>
          <a href=""><img width="50px" height="50px" src="{{URL::asset('public/uploads/product/' . $details_product->product_image)}}" alt="" /></a>
        </div>
        <div class="item">
          <a href=""><img width="50px" height="50px" src="{{URL::asset('public/uploads/product/' . $details_product->product_image)}}" alt="" /></a>
          <a href=""><img width="50px" height="50px" src="{{URL::asset('public/uploads/product/' . $details_product->product_image)}}" alt="" /></a>
          <a href=""><img width="50px" height="50px" src="{{URL::asset('public/uploads/product/' . $details_product->product_image)}}" alt="" /></a>
        </div>
      </div>
      <a class="left item-control" href="#similar-product" data-slide="prev">
        <i class="fa fa-angle-left"></i>
      </a>
      <a class="right item-control" href="#similar-product" data-slide="next">
        <i class="fa fa-angle-right"></i>
      </a>
    </div> -->
  </div>
  <div class="col-sm-7">
    <div class="product-information">
      <!--/product-information-->
      <img src="{{URL::asset('public/frontend/images/new.jpg')}}" class="newarrival" alt="" />
      <h2>{{$details_product->product_name}}</h2>
      <p>Mã sản phẩm: {{$details_product->product_id}}</p>
      <img src="{{URL::asset('public/frontend/images/rating.png')}}" alt="" />

      <form action="{{ URL::to('/save-cart') }}" method="post">
        {{ csrf_field() }}
        <span>
          <span>{{number_format($details_product->product_price) . ' VND'}}</span>
          <label>Số lượng:</label>
          <input name="qty" type="number" min="1" max="100" value="1" />
          <input name="productid_hidden" type="hidden" value="{{ $details_product->product_id }}"/>
          <button type="submit" class="btn btn-fefault cart">
            <i class="fa fa-shopping-cart"></i>
            Thêm giỏ hàng
          </button>
        </span>
      </form>

      <p><b>Tình trạng:</b> Còn hàng</p>
      <p><b>Điều kiện:</b> Mới 100%</p>
      <p><b>Danh mục sản phẩm: </b><a href="{{URL::to('/danh-muc-san-pham/'.$details_product->category_id)}}">{{$details_product->category_name}}</a></p>
      <p><b>Thương hiệt sản phẩm: </b><a href="{{URL::to('/thuong-hieu-san-pham/'.$details_product->brand_id)}}">{{$details_product->brand_name}}</a></p>
      <a href=""><img src="{{URL::asset('public/frontend/images/share.png')}}" class="share img-responsive" alt="" /></a>
    </div>
    <!--/product-information-->
  </div>
</div>
@endforeach
<!--/product-details-->
<div class="category-tab shop-details-tab">
  <!--category-tab-->
  <div class="col-sm-12">
    <ul class="nav nav-tabs">
      <li  class="active"><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
      <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
      <li><a href="#reviews" data-toggle="tab">Đánh giá (5)</a></li>
    </ul>
  </div>
  <div class="tab-content">
    <div class="tab-pane fade active in" id="details">
      <div class="jumbotron">
        <h2>{{$details_product->product_name}}</h2>
        <p>{!!$details_product->product_desc!!}</p>
      </div>
    </div>
    <div class="tab-pane fade" id="companyprofile">
      <div class="jumbotron">
        <p>{!!$details_product->product_content!!}</p>
      </div>
    </div>
    <div class="tab-pane fade" id="reviews">
      <div class="col-sm-12">
        <ul>
          <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
          <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
          <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
        </ul>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        <p><b>Write Your Review</b></p>
        <form action="#">
          <span>
            <input type="text" placeholder="Your Name" />
            <input type="email" placeholder="Email Address" />
          </span>
          <textarea name=""></textarea>
          <b>Rating: </b> <img src="{{URL::asset('public/frontend/images/rating.png')}}" alt="" />
          <button type="button" class="btn btn-default pull-right">
            Submit
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/category-tab-->
<div class="recommended_items">
  <!--recommended_items-->
  <h2 class="title text-center">Sản phẩm liên quan</h2>
  <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="item active">
        @foreach ($related_product as $key => $related_product)
        <div class="col-sm-4">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center p-4">
                <img src="{{URL::asset('public/uploads/product/' . $related_product->product_image)}}" alt="" />
                <h2>{{$related_product->product_name}}</h2>
                <p>{!!$related_product->product_content!!}</p>
                <p>{{number_format($related_product->product_price) . ' VND'}}</p>
                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
      <i class="fa fa-angle-left"></i>
    </a>
    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
      <i class="fa fa-angle-right"></i>
    </a>
  </div>
</div>
<!--/recommended_items-->
@endsection