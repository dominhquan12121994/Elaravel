@extends('admin_layout')
@section('admin_content')
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Thêm thương hiệu sản phẩm
      </header>
      <?php
        $message = Session::get('message');
        if ($message) {
          echo $message;
          Session::put('message', null);
        }
      ?>
      <div class="panel-body">
        <div class="position-center">
          <form role="form" method="POST" action="{{URL::to('/save-brand-product')}}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Tên thương hiệu</label>
              <input name="brand_product_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Mô tả thương hiệu</label>
              <textarea name="brand_product_desc" style="resize: none;" rows="5" class="form-control" id="exampleInputPassword1" placeholder="Mô tả thương hiệu"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Hiển thị</label>
              <select name="brand_product_status" class="form-control input-lg m-bot15">
                <option value="0">Ẩn</option>
                <option value="1">Hiển thị</option>
              </select>
            </div>
            <button name="add_brand_product" type="submit" class="btn btn-info">Thêm thương hiệu</button>
          </form>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection