@include('admin.admin_header')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách khách hàng</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Backup Data</a>
    </div>
    <!-- Content Row -->
    <div class="row">
        {{-- Alert --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if (session('message'))
            <script>
                swal("{{ session('message') }}");
            </script>
        @endif

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                               Khách hàng kim cương
                            </div>
                            @foreach($bestUser  as $row)
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $row->name }}
                            </div>
                            @endforeach
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $row)
            <tr>
                <th scope="row">{{ $row->id }}</th>
                <td>{{ $row->name}}</td>
                <td>{{ $row->phone}}</td>
                <td>{{ $row->email}}</td>
                <td>{{ $row->address }}</td>
                <td>
                    <button type="button" class="btn btn-success"><a href="/admin/users/edit/{{ $row->id }}"><i class="fas fa-edit"></i></a></button>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<!-- End of Content Wrapper -->
@include('admin.admin_footer')