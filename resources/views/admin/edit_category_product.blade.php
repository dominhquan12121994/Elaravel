@extends('admin_layout')
@section('admin_content')
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Cập nhật danh mục sản phẩm
      </header>
      <?php
        $message = Session::get('message');
        if ($message) {
          echo $message;
          Session::put('message', null);
        }
      ?>
      <div class="panel-body">
        @foreach($edit_category_product as $key => $edit_value)
        <div class="position-center">
          <form role="form" method="POST" action="{{URL::to('/update-category-product/' . $edit_value->category_id)}}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Tên danh mục</label>
              <input name="category_product_name" value="{{ $edit_value->category_name }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Mô tả danh mục</label>
              <textarea name="category_product_desc" style="resize: none;" rows="5" class="form-control" id="exampleInputPassword1">{{ $edit_value->category_desc }}</textarea>
            </div>
            <button name="add_category_product" type="submit" class="btn btn-info">Cập nhật danh mục</button>
          </form>
        </div>
        @endforeach
      </div>
    </section>
  </div>
</div>
@endsection