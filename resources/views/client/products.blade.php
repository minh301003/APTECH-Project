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

    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="{{ url('./css/app.css') }}" type="text/css">
</head>

@include('client.header')
<main role="main">
        <!-- Danh sách sản phẩm -->
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Danh sách Sản phẩm</h1>
                <p class="lead text-muted">Các sản phẩm với chất lượng, uy tín, cam kết từ nhà Sản xuất, phân phối và
                    bảo hành
                    chính hãng.</p>
            </div>
        </section>

        <!-- Giải thuật duyệt và render Danh sách sản phẩm theo dòng, cột của Bootstrap -->
        <div class="row bg-white">
            <div class="col-lg-3" style="border:1px solid #ccc">
                <h2 class="text-center mt-4">Lọc sản phẩm</h2>
                <form action="{{ route('locsanpham') }}" method="get">
                    <div class="container">
                        <span>Tìm kiếm</span>
                        <input class="form-control form-control-lg" type="search" name="search" id="" value="@if(isset($search)){{ $search }}@endif" placeholder="Bạn muốn tìm gì?">
                        <div>Nhà sản xuất</div>
                        @foreach ($catalogs as $row)
                        <label for="nsx" class="d-block">
                            <input type="checkbox" class="" name="factory[]" checked value="{{ $row->id }}" id=""> {{ $row->catalog_name }}
                        </label>
                        @endforeach
                        <div>Tầm giá</div>
                        <div class="row">
                            <div class="col custom-control custom-radio mt-1 d-inline-block" style="padding-left: 0px; width:60%">
                                <input type="range" class="custom-range" name="min" min="50000" max="50000000" value="50000" id="">Thấp nhất
                            </div>
                            <div class="col custom-control custom-radio mt-1 d-inline-block" style="padding-left: 0px; width:60%">
                                <input type="range" class="custom-range" name="max" min="50000" max="50000000" value="25000000" id="">Cao nhất
                            </div>
                        </div>
                        <div>Màu sắc</div>
                        <input type="radio" name="color" value="red" id=""> Đỏ
                        <input type="radio" name="color" value="gold" id=""> Vàng
                        <input type="radio" name="color" value="blue" id=""> Xanh 
                        <div>
                            <input type="submit" class="btn btn-outline-success" value="Lọc">
                        </div>
                        
                    </div>

                </form>
            </div>
            <div class="danhsachsanpham py-5 bg-light col-lg-9">
                <div class="container">
                    <div class="row">
                    @foreach ($products as $row)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <a href="/products/{{ $row->id }}">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="350"
                                        src="{{ url( $row->productImages[0]->image) }}">
                                </a>
                                <div class="card-body">
                                    <a href="">
                                        <h5>{{$row->name}}</h5>
                                    </a>
                                    <h6>Điện thoại</h6>
                                    <p class="card-text">Sản phẩm của Apple</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-outline-secondary"
                                                href="/products/{{ $row->id }}">Xem chi tiết</a>
                                        </div>
                                        <small class="text-muted text-right">
                                            <s>12,600,000.00</s>
                                            <b>{{ number_format($row->price)}} vnđ</b>
                                        </small>
                                    </div>
                                    <form action="{{ route('cart.store') }}" method="GET" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $row->id }}" name="id">
                                            <input type="hidden" value="{{ $row->name }}" name="name">
                                            <input type="hidden" value="{{ $row->price }}" name="price">
                                            <input type="hidden" value="{{ $row->productImages[0]->image }}" name="img">
                                            <input type="hidden" value="1" name="quantity">
                                            <button class="btn btn-success" style="margin-top: 10px;"><i class=" fas fa-light fa-cart-shopping"></i>Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        

        <!-- End block content -->
</main>



@include('client.footer')
