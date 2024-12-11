<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
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
        footer {
            background-color: #f8f9fa; /* Màu nền của footer */
            padding: 20px 0; /* Khoảng cách bên trên và bên dưới */
            margin-top: 240px;
            text-align: center; /* Căn giữa nội dung footer */
        }
        footer p {
            margin: 0; /* Bỏ khoảng cách mặc định */
            color: #6c757d; /* Màu chữ */
        }
</style>
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
                <a class="nav-link" href="tel:0854620890"><i class="fas fa-phone fa-lgs"></i> Liên Hệ </a>
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
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="dropdown-item">Đăng Xuất</button>
                        </form>
                    </div>
                </div>
            </div>
            <a href="{{ route('cart.index') }}" class="nav-link"><i class="fas fa-shopping-cart fa-lg"></i></a>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <!-- Cột cho thông tin sản phẩm -->
            <div class="col-md-12">
                <h2 class="mt-4">{{ $product->name }}</h2>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Số lượng</th>
                            <td>{{ $product->quantity }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Giá</th>
                            <td>{{ number_format($product->price, 2) }} VNĐ</td>
                        </tr>
                        <tr>
                            <th scope="row">Mô tả</th>
                            <td>{{ $product->description }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="container mt-4">
    <div class="d-flex justify-content-between">
        <a href="{{ route('index') }}">
            <button class="btn btn-secondary">Quay Lại</button>
        </a>
        <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
        </form>
    </div>
</div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Trang Mua Bán Máy Hút Mùi. Bảo lưu mọi quyền.</p>
        <p><a href="#">Chính sách bảo mật</a> | <a href="#">Điều khoản sử dụng</a></p>
    </footer>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
