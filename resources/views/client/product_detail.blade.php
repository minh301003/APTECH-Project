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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
          integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="{{ url('./css/product-detail.css') }}" type="text/css">

</head>

@include('client.header')
<main role="main">
    <div class="container mt-4">
        <div id="thongbao" class="alert alert-danger d-none face" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="card">
            <div class="container-fliud">
                <div>
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane" id="pic-1">
                                    <img src="{{ url($products->productImages[0]->image) }}">
                                </div>
                                <div class="tab-pane" id="pic-2">
                                    <img src="{{ url($products->productImages[1]->image) }}">
                                </div>
                                <div class="tab-pane active" id="pic-3">
                                    <img src="{{ url($products->productImages[2]->image) }}">
                                </div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active">

                                    <a data-target="#pic-1" data-toggle="tab" class="">
                                        <img src="{{ url($products->productImages[0]->image)}}">
                                    </a>
                                </li>
                                <li class="">
                                    <a data-target="#pic-2" data-toggle="tab" class="">
                                        <img src="{{ url($products->productImages[1]->image)}}">
                                    </a>
                                </li>
                                <li class="">
                                    <a data-target="#pic-3" data-toggle="tab" class="active">
                                        <img src="{{ url($products->productImages[2]->image) }}">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title">{{ $products->name }}</h3>
                            @php $ratenum = number_format($rating_value) @endphp
                            <div class="rating">
                                <div class="stars">
                                    @for($i=1; $i <= $ratenum; $i++)
                                    <span class="fa fa-star checked"></span>
                                    @endfor
                                    @for($j=$ratenum+1; $j <= 5; $j++)
                                    <span class="fa fa-star"></span>
                                    @endfor
                                </div>
                                <span class="review-no">
                                    @if ($ratings->count() == 0)
                                    No review
                                    @elseif($ratings->count() == 1)
                                    1 review
                                    @else
                                    {{ $ratings->count()}} reviews
                                    @endif
                                </span>
                            </div>
                            <p class="product-description">Danh mục: {{ $products->catalog->catalog_name}}</p>
                            <small class="text-muted">Giá cũ: <s><span>30,990,000.00 VNĐ</span></s></small>
                            <h4 class="price">Giá hiện tại: <span>{{ number_format($products->price) }} VNĐ</span></h4>
                            <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                <strong>Uy tín</strong>!</p>

                            
                            <form action="{{ route('cart.store') }}" method="GET" enctype="multipart/form-data">
                                <input type="hidden" value="{{ $products->id }}" name="id">
                                <input type="hidden" value="{{ $products->name }}" name="name">
                                <input type="hidden" value="{{ $products->price }}" name="price">
                                <input type="hidden" value="{{ $products->productImages[0]->image }}" name="img">
                                <label for="soluong">Số lượng đặt mua:</label>
                                <input type="number" class="form-control" id="soluong" name="quantity" value="1">
                                <button type="submit" class="add-to-cart btn btn-default" id="btnThemVaoGioHang">
                                        <i class=" fas fa-light fa-cart-shopping"></i>Thêm vào giỏ hàng
                                </button>
                                <a class="like btn btn-default" href="#"><span class="fa fa-heart"></span></a>
                            </form>

                            <button type="submit" class="rounded rate-button btn btn-success" data-toggle="modal" data-target="#exampleModal">Rate this product</button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Rate {{ $products->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('rating') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">

                                                        <input type="hidden" name="product_ID" value="{{ $products->id }}">
                                                        <div class="form-group">
                                                            <label for="commment">Đánh giá sản phẩm:</label>
                                                            <input type="text" class="form-control" name="comment">
                                                        </div>
                                                        <div class="rating-css">
                                                            <div class="star-icon">
                                                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                                                <label for="rating1" class="fa fa-star"></label>
                                                                <input type="radio" value="2" name="product_rating" id="rating2">
                                                                <label for="rating2" class="fa fa-star"></label>
                                                                <input type="radio" value="3" name="product_rating" id="rating3">
                                                                <label for="rating3" class="fa fa-star"></label>
                                                                <input type="radio" value="4" name="product_rating" id="rating4">
                                                                <label for="rating4" class="fa fa-star"></label>
                                                                <input type="radio" value="5" name="product_rating" id="rating5">
                                                                <label for="rating5" class="fa fa-star"></label>
                                                            </div>
                                                        </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Gửi</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="container-fluid">
                <h3>Thông tin chi tiết về Sản phẩm</h3>
                <div class="row">
                    <div class="col">
                        {{ $products->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Hiển thị sản phẩm liên quan --}}
    <!-- Danh sách sản phẩm -->
    <section class="text-center">
        <div class="container">
            <h3 class="jumbotron-heading">Sản phẩm liên quan</h3>
        </div>
    </section>


    <!-- Giải thuật duyệt và render Danh sách sản phẩm theo dòng, cột của Bootstrap -->
    <div class="danhsachsanpham py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach ($related_products as $related_product)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <a href="/products/{{ $related_product->id }}">
                                <img class="bd-placeholder-img card-img-top" width="100%" height="350"
                                     src="{{ url( $related_product->productImages[0]->image) }}">
                            </a>
                            <div class="card-body">
                                <a href="">
                                    <h5>{{$related_product->name}}</h5>
                                </a>
                                <h6>Điện thoại</h6>
                                <p class="card-text">Sản phẩm của Apple</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondary"
                                           href="/products/{{ $related_product->id }}">Xem chi tiết</a>
                                    </div>
                                    <small class="text-muted text-right">
                                        <s>12,600,000.00 VNĐ</s>
                                        <b>{{ number_format($related_product->price)}} VNĐ</b>
                                    </small>
                                </div>
                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $related_product->id }}" name="id">
                                    <input type="hidden" value="{{ $related_product->name }}" name="name">
                                    <input type="hidden" value="{{ $related_product->price }}" name="price">
                                    <input type="hidden" value="{{ $related_product->productImages[0]->image }}"
                                           name="img">
                                    <input type="hidden" value="1" name="quantity">
                                    <button class="btn btn-success" style="margin-top: 10px;"><i
                                            class=" fas fa-light fa-cart-shopping"></i>Thêm vào giỏ hàng
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Đánh giá của khách hàng -->
    <h2 class="ml-3 font-weight-bolder">Đánh giá của khách hàng</h2>
    <div class="col">
        @foreach($ratings as $rating)
        <div class="border rounded border-1 border-primary p-2 pl-3 mt-3">
            <label for="" class="text-danger font-weight-bolder">{{ $rating->users->name}}</label>
            <br>
            <small> {{ $rating->created_at->format('d M Y') }}</small>
            <br>
            @php $user_rate = $rating->star @endphp
                <div class="rating">
                    <div class="stars">
                        @for($i=1; $i <= $user_rate; $i++)
                        <span class="fa fa-star checked"></span>
                        @endfor
                        @for($j=$user_rate+1; $j <= 5; $j++)
                        <span class="fa fa-star"></span>
                        @endfor
                    </div>
                </div>
            <hr>
            <p>Nhận xét: {{ $rating->comment }}</p>
        </div>
        @endforeach
    </div>

</main>


@include('client.footer')
