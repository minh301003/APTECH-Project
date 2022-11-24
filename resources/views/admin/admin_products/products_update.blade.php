@include('admin.admin_header')
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật sản phẩm</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Backup Data</a>
    </div>

   <!-- Content Row -->
   <div class="container p-">
    {{-- Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('message'))
        <script>
            swal("{{ session('message') }}");
        </script>
    @endif
    @if ($errors->any())
    <div class="alert alert-warning">
      @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
      @endforeach
    </div>
    @endif
    <form method="POST" action="/admin/products/update/{{ $products->id }}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf
      <div class="form-group">
          <label for="catalog">Danh mục sản phẩm:</label>
          <select name="catalog_ID" class="form-control">
            @foreach ($catalogs as $catalog)
            <option value="{{ $catalog->id }}" {{ $catalog->id == $products->catalog_ID ? 'selected':'' }}>
              {{ $catalog->catalog_name }}
            </option>
            @endforeach
          </select>
      </div>
      <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="" class="form-control" id="name" value="{{ $products->name }}" name="name">
      </div>
      <div class="form-group">
        <label for="price">Giá tiền:</label>
        <input type="" class="form-control" id="price" value="{{ $products->price }}" name="price">
      </div>
      <div class="form-group">
        <label for="description">Mô tả:</label>
        <input type="" class="form-control" id="description" value="{{ $products->description }}" name="description">
      </div>
      <div class="form-group">
        <label for="amount">Số lượng:</label>
        <input type="" class="form-control" id="amount" value="{{ $products->amount}}" name="amount">
      </div>
      <div class="form-group">
        <p>Hình ảnh:</p>
        <div class="custom-file mb-3">
          <input type="file" class="custom-file-input" id="image" name="image[]" multiple class = "form-control" />
          <label class="custom-file-label" for="image">Chọn ảnh</label>
        </div>
        <div>
          @if($products->productImages)
          <div class="row">
              @foreach ($products->productImages as $image)
              <div class="col-md-2">
                <img src="{{ asset($image->image) }}" style="width: 80px;height: 80px;"
                class="me-4 border" alt="Img" />
                <button type="submit" class="btn btn-danger"><a href="/admin/products/product-image/delete/{{ $image->id }}">Xóa</a></button>
              </div>
              @endforeach
          </div>      
          @else
          <h5>Chưa có ảnh nào</h5>
          @endif
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Xác nhận</button>
    </form>
</div>



</div>
<!-- End of Content Wrapper -->
@include('admin.admin_footer')