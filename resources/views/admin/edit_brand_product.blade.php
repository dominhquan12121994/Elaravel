@extends('admin_layout')
@section('admin_content')
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Cập nhật thương hiệu sản phẩm
      </header>
      <?php
        $message = Session::get('message');
        if ($message) {
          echo $message;
          Session::put('message', null);
        }
      ?>
      <div class="panel-body">
        @foreach($edit_brand_product as $key => $edit_value)
        <div class="position-center">
          <form role="form" method="POST" action="{{URL::to('/update-brand-product/' . $edit_value->brand_id)}}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Tên thương hiệu</label>
              <input name="brand_product_name" value="{{ $edit_value->brand_name }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Mô tả thương hiệu</label>
              <textarea name="brand_product_desc" style="resize: none;" rows="5" class="form-control" id="exampleInputPassword1">{{ $edit_value->brand_desc }}</textarea>
            </div>
            <button name="add_brand_product" type="submit" class="btn btn-info">Cập nhật thương hiệu</button>
          </form>
        </div>
        @endforeach
      </div>
    </section>
  </div>
</div>
@endsection