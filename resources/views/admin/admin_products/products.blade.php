@include('admin.admin_header')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách sản phẩm</h1>
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
                               Lượt mua nhiều nhất
                            </div>
                            @foreach($mostBuyProduct as $row)
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

         <!-- Pending Requests Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Đánh giá tốt nhất
                            </div>
                            @foreach($top_rated_product  as $row)
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $row->name }}
                            </div>
                            @endforeach
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng số sản phẩm
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $numberOfProducts}}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                             style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                <th scope="col">Danh mục</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá tiền</th>
                <th scope="col">Tồn kho</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $row)
            <tr>
                <th scope="row">{{ $row->id }}</th>
                <td>{{ $row->catalog->catalog_name}}</td>
                <td>{{ $row->name }}</td>
                <td>{{ number_format($row->price) }}</td>
                <td>{{ $row->amount }}</td>
                <td>
                    <button type="button" class="btn btn-success"><a href="/admin/products/edit/{{ $row->id }}"><i class="fas fa-edit"></i></a></button>
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="far fa-trash-alt"></i></button>
                </td>
            
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Bạn chắc chắn muốn xóa sản phẩm này chứ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <form method="POST" action="/admin/products/delete/{{ $row->id }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>   
                                </div>
                            </div>
                        </div>
                    </div> 
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<!-- End of Content Wrapper -->
@include('admin.admin_footer')