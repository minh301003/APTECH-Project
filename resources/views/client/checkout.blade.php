@include('client.header')

<main role="main">
    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <div class="container mt-4">
        <form class="needs-validation" action="{{ route('place.order') }}" method="POST">
            @csrf
            <div class="py-5 text-center">
                <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                <h2>Thanh toán</h2>
                <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
            </div>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <ul class="list-group mb-3">
                        <span class="text-muted">Giỏ hàng</span>
                        @foreach ($cartItems as $item)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $item->name }}</h6>
                                    <small class="text-muted">{{ number_format($item->price) }} x {{ $item->quantity}}</small>
                                </div>
                                <span class="text-muted">{{ number_format($item->price*$item->quantity) }}</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng thành tiền</span>
                            <strong>{{ number_format(Cart::getTotal()) }} VNĐ</strong>
                        </li>
                    </ul>


                    
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Thông tin khách hàng</h4>
                   
                        <div class="row">
                            <div class="col-md-12">
                                <label for="user_name">Họ tên</label>
                                <input type="text" class="form-control" name="user_name" id="user_name"
                                    value="{{ Auth::user()->name }}">
                            </div>
                            <div class="col-md-12">
                                <label for="user_address">Địa chỉ</label>
                                <input type="text" class="form-control" name="user_address" id="user_address"
                                value="{{ Auth::user()->address }}" >
                            </div>
                            <div class="col-md-12">
                                <label for="user_phone">Điện thoại</label>
                                <input type="text" class="form-control" name="user_phone" id="user_phone"
                                    value="{{ Auth::user()->phone }}">
                            </div>
                            <div class="col-md-12">
                                <label for="user_email">Email</label>
                                <input type="text" class="form-control" name="user_email" id="user_email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                        </div>

                        <h4 class="mb-3">Hình thức thanh toán</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="httt-1" name="payment_method" type="radio" class="custom-control-input" required=""
                                    value="Tiền mặt">
                                <label class="custom-control-label" for="httt-1">Tiền mặt</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="httt-2" name="payment_method" type="radio" class="custom-control-input" required=""
                                    value="Chuyển khoản">
                                <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="httt-3" name="payment_method" type="radio" class="custom-control-input" required=""
                                    value="Ship COD">
                                <label class="custom-control-label" for="httt-3">Ship COD</label>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Đặt
                            hàng</button>
                </div>
            </div>
        </form>

    </div>
    <!-- End block content -->
</main>

@include('client.footer')