@include('admin.admin_header')
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin khách hàng</h1>
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
    <form method="POST" action="/admin/users/update/{{ $users->id }}">
      @method('PATCH')
      @csrf
      <div class="form-group">
        <label for="name">Tên khách hàng:</label>
        <input type="" class="form-control" id="name" value="{{ $users->name }}" name="name">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="" class="form-control" id="email" value="{{ $users->email}}" name="email">
      </div>
      <div class="form-group">
        <label for="phone">Số điện thoại:</label>
        <input type="" class="form-control" id="phone" value="{{ $users->phone }}" name="phone">
      </div>
      <div class="form-group">
        <label for="address">Địa chỉ:</label>
        <input type="" class="form-control" id="address" value="{{ $users->address}}"" name="address">
      </div>
      <button type="submit" class="btn btn-primary">Xác nhận</button>
    </form>
</div>

</div>
<!-- End of Content Wrapper -->
@include('admin.admin_footer')