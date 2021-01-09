@extends('admin_layout')
@section('admin_content')
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Thêm sản phẩm
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
          <form id="form1" enctype="multipart/form-data" role="form" method="POST" action="{{URL::to('/save-product')}}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Tên sản phẩm</label>
              <input name="product_name" type="text" class="form-control" id="firstname" data-rule-required="true" placeholder="Tên sản phẩm" 
                data-validation="length" data-validation-length="min3" data-validation-error-msg="Vui lòng điền ít nhất 3 kí tự">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Giá sản phẩm</label>
              <input name="product_price" type="text" class="form-control" id="exampleInputEmail11" placeholder="Giá sản phẩm">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
              <input name="product_image" type="file" class="form-control" id="exampleInputEmail111" placeholder="Hình ảnh sản phẩm">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Mô tả sản phẩm</label>
              <textarea name="product_desc" style="resize: none;" rows="5" class="form-control" id="ckeditor1" placeholder="Mô tả sản phẩm"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nội dung sản phẩm</label>
              <textarea name="product_content" style="resize: none;" rows="5" class="form-control" id="ckeditor2" placeholder="Nội dung sản phẩm"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Danh mục sản phẩm</label>
              <select name="product_cate" class="form-control input-lg m-bot15">
                @foreach($cate_product as $key => $cate)
                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
              <select name="product_brand" class="form-control input-lg m-bot15">
                @foreach($brand_product as $key => $brand)
                  <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Hiển thị</label>
              <select name="product_status" class="form-control input-lg m-bot15">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
              </select>
            </div>
            <button name="add_product" type="submit" class="btn btn-info">Thêm sản phẩm</button>
          </form>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection