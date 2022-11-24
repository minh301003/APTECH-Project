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

<body>

    <!-- header -->

    <nav class="navbar navbar-expand-custom navbar-mainbg bg-dark">
        <a class="navbar-brand navbar-logo" href="#">Trang chủ</a>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <form class="form-inline mt-2 mt-md-0" method="GET" action="/client/search">
                    <input class="form-control mx-0 rounded-left" name="search" type="text" placeholder="Tìm kiếm" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0 mx-0 rounded-right" type="submit"><i class=" fas fa-thin fa-magnifying-glass"></i></button>
        </form>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector">
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
                <li class="nav-item">


                    <a class="nav-link" href="{{ route('products.list') }}"><i class="fas fa-tachometer-alt"></i>Sản phẩm</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-address-book"></i>Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.list') }}"><i class=" fas fa-light fa-cart-shopping"></i>Giỏ hàng</a>
                </li>    
            @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="/login"><i class="fa-solid fa-right-to-bracket"></i></i>Đăng nhập</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="/register"><i class="fa-solid fa-user-plus"></i>Đăng ký</a>
                        </li>
                    @endif
                @else
                    <li class="">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                         {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>  --}}
                        

                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <!-- end header -->


</body>
</html>
