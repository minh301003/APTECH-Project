@include('admin.admin_header')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách danh mục sản phẩm</h1>
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
                <th scope="col">Tên danh mục</th>
                <th scope="col">Ngày tạo</th>
            </tr>
            </thead>
            <tbody>
                @foreach($catalogs as $row)
            <tr>
                <th scope="row">{{ $row->id }}</th>
                <td>{{ $row->catalog_name}}</td>
                <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<!-- End of Content Wrapper -->
@include('admin.admin_footer')