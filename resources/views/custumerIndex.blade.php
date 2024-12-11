<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Trang Mua Bán Máy Hút Mùi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .navbar-nav .nav-item {
            margin-right: 20px; /* Khoảng cách giữa các mục */
        }
        .navbar-brand img {
            height: 50px;
        }
        .form-inline .form-control {
            width: 250px; /* Điều chỉnh kích thước của ô tìm kiếm */
        }
        .btn-group .dropdown-menu {
            left: auto;
            right: 0; /* Đảm bảo menu dropdown căn lề phải */
        }
        .product-card {
            margin-bottom: 30px;
        }
        .product-card img {
            height: 200px;
            object-fit: cover;
        }
        .carousel-item img {
            width: 100%; /* Đảm bảo hình ảnh chiếm toàn bộ chiều rộng */
            height: 500px; /* Để giữ tỉ lệ hình ảnh */
        }
        /* Đặt kích thước cho carousel */
        #carouselExample {
            margin: 0 auto; /* Căn giữa carousel */
        }
        footer {
            background-color: #f8f9fa; /* Màu nền của footer */
            padding: 20px 0; /* Khoảng cách bên trên và bên dưới */
            text-align: center; /* Căn giữa nội dung footer */
        }
        footer p {
            margin: 0; /* Bỏ khoảng cách mặc định */
            color: #6c757d; /* Màu chữ */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('index') }}"><img src="https://canaval.com.vn/wp-content/uploads/2021/11/z2900923254304_405bf8eb4df0edd57e76840b1dc3af03-removebg-preview.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}"><i class="fas fa-list fa-lgs"></i> Danh Mục</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('order.index') }}"><i class="fas fa-book fa-lgs"></i> Đơn Hàng</a>
            </li>
                <li class="nav-item">
                <a class="nav-link" href="tel:0854620890" target="blank"><i class="fas fa-phone fa-lgs"></i> Liên Hệ </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search fa-lg"></i></button>
            </form>
            <div class="ml-2">
                <div class="btn-group" role="group">
                    <a href="#" id="btnGroupDrop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle fa-lg"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                @if(Auth::check()) 
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="dropdown-item">Đăng Xuất</button>
                 </form>
                 @else
                <a class="dropdown-item" href="{{ route('login') }}">Đăng Nhập</a>
                 @endif
                </div>

                </div>
            </div>
            <a href="{{ route('cart.index') }}" class="nav-link"><i class="fas fa-shopping-cart fa-lg"></i></a>
        </div>
    </nav>

    <div id="carouselExample" class="carousel slide mt-1" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.w3schools.com/bootstrap/ny.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://www.w3schools.com/bootstrap/la.jpg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://www.w3schools.com/bootstrap/chicago.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Trở lại</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Tiếp theo</span>
        </a>
    </div>

    <div class="container mt-4">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://bizweb.dktcdn.net/thumb/grande/100/357/739/products/cz-3670.jpg?v=1561119829287" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Số lượng: {{ $product->quantity }}</p>
                            <p class="card-text">Giá: {{ number_format($product->price, 2) }} VNĐ</p>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                            </form>
                            <a href="{{ route('product.index', $product->id) }}"><button class="btn btn-danger mt-1">Xem chi tiết</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Trang Mua Bán Máy Hút Mùi. Bảo lưu mọi quyền.</p>
        <p><a href="#">Chính sách bảo mật</a> | <a href="#">Điều khoản sử dụng</a></p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
