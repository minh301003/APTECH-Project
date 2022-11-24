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
        @if (session('message'))
            <h5 class="alert alert-success">{{ session('message') }} </h5>
        @endif
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