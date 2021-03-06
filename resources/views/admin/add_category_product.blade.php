@extends('admin_layout')
@section('admin_content')
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Thêm danh mục sản phẩm
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
          <form role="form" method="POST" action="{{URL::to('/save-category-product')}}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Tên danh mục</label>
              <input name="category_product_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Mô tả danh mục</label>
              <textarea name="category_product_desc" style="resize: none;" rows="5" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Hiển thị</label>
              <select name="category_product_status" class="form-control input-lg m-bot15">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
              </select>
            </div>
            <button name="add_category_product" type="submit" class="btn btn-info">Thêm danh mục</button>
          </form>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection