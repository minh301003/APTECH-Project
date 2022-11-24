@include('admin.admin_header')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chi tiết đơn hàng</h1>
        <a href="{{ route('admin.order') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Back</a>
    </div>
    <!-- Content Row -->
    <div class="row">
       <div class="col-md-6">
            <h6 class="h6 mb-0 text-gray-800">Thông tin giao hàng</h6>
            <hr>
            <div class="form-group">
                <label for="">Tên khách hàng:</label>
                <div class="form-control">{{ $order[0]->user_name }}</div>
            </div>
            <div class="form-group">
                <label for="">Số điện thoại:</label>
                <div class="form-control">{{ $order[0]->user_phone }}</div>
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <div class="form-control">{{ $order[0]->user_email }}</div>
            </div>
            <div class="form-group">
                <label for="">Địa chỉ:</label>
                <div class="form-control">{{ $order[0]->user_address }}</div>
            </div>
            <div class="form-group">
                <label for="">Hình thức thanh toán:</label>
                <div class="form-control">{{ $order[0]->payment_method }}</div>
            </div>   
       </div>
       <div class="col-md-6">
            <h6 class="h6 mb-0 text-gray-800">Thông tin đơn hàng</h6>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order[0]->orderDetails as $item)
                    <tr>
                        <th>{{ $item->products->name }}</th>
                        <th>{{$item->amount}}</th>
                        <th>{{number_format($item->total / $item->amount) }}</th>
                        <th>{{number_format($item->total) }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4 class="text-xl text-danger">Tổng tiền: {{ number_format($order[0]->total) }}</h4>
            <div class="mt-3">
                <label for="">Trạng thái giao hàng: </label>
                <form method="POST" action="{{ url('/admin/update_order/'.$order[0]->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <select class="form-control" name="accept_status">
                            <option {{ $order[0]->accept_status == '0' ? 'Chọn': '' }} value="0">Chưa duyệt</option>
                            <option {{ $order[0]->accept_status == '1' ? 'Chọn': '' }} value="1">Đã duyệt</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="payment_status">
                            <option {{ $order[0]->payment_status == '0' ? 'Chọn': '' }} value="0">Chưa thanh toán</option>
                            <option {{ $order[0]->payment_status == '1' ? 'Chọn': '' }} value="1">Đã thanh toán</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="ship_status">
                            <option {{ $order[0]->ship_status == '0' ? 'Chọn': '' }} value="0">Chưa giao hàng</option>
                            <option {{ $order[0]->ship_status == '1' ? 'Chọn': '' }} value="1">Giao hàng thành công</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
       </div>
    </div>
</div>
<!-- End of Content Wrapper -->
@include('admin.admin_footer')