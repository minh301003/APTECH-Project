@include('admin.admin_header')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin</h1>
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
        <form method="POST" action="/admin/admins/update/{{ $admins->id}}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
          <div class="form-group">
            <label for="name">Tên nhân viên:</label>
            <input type="" class="form-control" id="name" value="{{ $admins->name }}" name="name">
          </div>
          <div class="form-group">Email:</label>
            <input type="" class="form-control" id="email" value="{{ $admins->email }}" name="email">
          </div>
          <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="form-group">
            <label for="lv">Chức vụ:</label>
              <select class="form-control" name="lv">
                  <option value="0">Nhân viên</option>
                  <option value="1">Quản lý</option>
              </select>
          </div>
          
          <button type="submit" class="btn btn-primary">Xác nhận</button>
        </form>
    </div>
    
    
    
</div>
<!-- End of Content Wrapper -->
@include('admin.admin_footer')