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
        <div class="col-sm-12 clearfix">
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
        </div>
      </div>
    </div>
    <div class="review-payment">
      <h2>Xem lại giỏ hàng</h2>
    </div>

    <div class="payment-options">
      <span>
        <label><input type="checkbox"> Direct Bank Transfer</label>
      </span>
      <span>
        <label><input type="checkbox"> Check Payment</label>
      </span>
      <span>
        <label><input type="checkbox"> Paypal</label>
      </span>
    </div>
  </div>
</section>
@endsection