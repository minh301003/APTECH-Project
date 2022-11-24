@include('admin.admin_header')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm sản phẩm mới</h1>
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
        <form method="POST" action="/admin/catalogs/store" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="catalog_name">Tên danh mục:</label>
            <input type="" class="form-control" id="catalog_name" placeholder="Thêm tên" name="catalog_name">
          </div>
          <button type="submit" class="btn btn-primary">Xác nhận</button>
        </form>
    </div>
    
    
    
</div>
<!-- End of Content Wrapper -->
@include('admin.admin_footer')