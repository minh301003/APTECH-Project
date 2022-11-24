<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tiny Shop| Chuyên đồ điện tử</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('./vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ url('./vendor/font-awesome/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="{{ url('./css/app.css') }}" type="text/css">
</head>

@include('client.header')

{{-- Alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session('success'))
    <script>
        swal("{{ session('success') }}");
    </script>
@endif
<main role="main">
        <div class="container mt-4">
            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <h1 class="text-center">Giỏ hàng</h1>
            <div class="row">
                <div class="col col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="datarow">
                            @foreach ($cartItems as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>
                                    <img src="{{ $item->attributes->img }}" class="hinhdaidien">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td class="text-right">

                                    <div class="input-group inline-group">
                                        <div class="input-group-prepend">
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id}}" >
                                            <input type="number" name="quantity" value="{{ $item->quantity }}"
                                            min="0" class="w-9 ml-2 mb-2 text-center bg-gray-300" />

                                            <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500">update</button>
                                        </form>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right">{{ number_format($item->price) }}</td>

                                <td>
                                  <form action="{{ route('cart.remove') }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $item->id }}" name="id">
                                  <button id="delete_1" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Xóa
`                                 </button>
                                  </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                         Tổng thanh toán: {{ number_format(Cart::getTotal()) }} VNĐ
                    <div class="row gap-3">
                            <a href="{{ route('home') }}" class="btn btn-warning btn-md"><i class="fa fa-arrow-left"
                            aria-hidden="true"></i>&nbsp;Quay về trang chủ</a>
                          <form action="{{ route('cart.clear') }}" method="POST" >
                            @csrf
                            <button id="delete_1" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Xóa tất cả
`                           </button>
                          </form>

                          <a href="{{ route('checkout') }}" class="btn btn-primary btn-md"><i
                            class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

@include('client.footer')

