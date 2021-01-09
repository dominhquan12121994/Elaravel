@extends ('layout')
@section ('content')
<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
        <li class="active">Thanh toán giỏ hàng</li>
      </ol>
    </div>
    <!--/breadcrums-->

    <div class="register-req">
      <p>Vui lòng đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
    </div>
    <!--/register-req-->

    <div class="shopper-informations">
      <div class="row">
        <!-- <div class="col-sm-3">
          <div class="shopper-info">
            <p>Shopper Information</p>
            <form>
              <input type="text" placeholder="Display Name">
              <input type="text" placeholder="User Name">
              <input type="password" placeholder="Password">
              <input type="password" placeholder="Confirm password">
            </form>
            <a class="btn btn-primary" href="">Get Quotes</a>
            <a class="btn btn-primary" href="">Continue</a>
          </div>
        </div> -->
        <!-- <div class="col-sm-12 clearfix">
          <div class="bill-to">
            <p>Điền thông tin gửi hàng</p>
            <div class="form-one">
              <form action="{{ URL::to('/save-checkout-customer') }}" method="POST">
                {{ csrf_field() }}
                <input name="shipping_email" type="text" placeholder="Địa chỉ email">
                <input name="shipping_name" type="text" placeholder="Họ và tên">
                <input name="shipping_address" type="text" placeholder="Địa chỉ">
                <input name="shipping_phone" type="text" placeholder="Số điện thoại">
                <textarea name="shipping_note" placeholder="Ghi chú đơn hàng" rows="5"></textarea>
                <input type="submit" value="Gửi đi" name="send_order" class="btn btn-primary">
              </form>
            </div>
          </div>
        </div> -->
      </div>
    </div>
    <div class="review-payment">
      <h2>Xem lại giỏ hàng</h2>
    </div>
    <div class="table-responsive cart_info">
      <?php
      $content = Cart::content();
      // echo '<pre>';
      // print_r($content);
      // echo '</pre>';
      ?>
      <table class="table table-condensed">
        <thead>
          <tr class="cart_menu">
            <td class="image">Hình ảnh sản phẩm</td>
            <td class="description">Mô tả sản phẩm</td>
            <td class="price">Giá</td>
            <td class="quantity">Số lượng</td>
            <td class="total">Tổng tiền</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          @foreach ($content as $v_content)
          <tr>
            <td class="cart_product">
              <a href="#"><img width="50px" height="50px" src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt=""></a>
            </td>
            <td class="cart_description">
              <h4><a href="">{{ $v_content->name }}</a></h4>
              <p>Mã sản phẩm: {{ $v_content->id }}</p>
            </td>
            <td class="cart_price">
              <p>{{ number_format($v_content->price) }}</p>
            </td>
            <td class="cart_quantity">
              <div class="cart_quantity_button">
                <form action="{{ URL::to('/update-cart-quantity') }}" method="POST">
                  {{ csrf_field() }}
                  <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{ $v_content->qty }}" autocomplete="off" size="2">
                  <input type="hidden" value="{{ $v_content->rowId }}" name="rowId_cart" class="btn btn-default btn-sm">
                  <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                </form>
              </div>
            </td>
            <td class="cart_total">
              <p class="cart_total_price">
                <?php
                $subtotal = $v_content->price * $v_content->qty;
                echo number_format($subtotal);
                ?>
              </p>
            </td>
            <td class="cart_delete">
              <a class="cart_quantity_delete" href="{{ URL::to('/delete-to-cart/' . $v_content->rowId) }}"><i class="fa fa-times"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <h4 style="margin-bottom: 50px;">Chọn hình thức thanh toán</h4>
    <div class="payment-options">
      <form action="{{ URL::to('/order-place') }}" method="post">
        {{ csrf_field() }}
        <span>
          <label><input name="payment_method" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
        </span>
        <span>
          <label><input name="payment_method" value="2" type="checkbox"> Nhận hàng trả tiền mặt</label>
        </span>
        <span>
          <label><input name="payment_method" value="3" type="checkbox"> Thanh toán thẻ ghi nợ</label>
        </span>
        <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary">
      </form>
    </div>
  </div>
</section>
@endsection