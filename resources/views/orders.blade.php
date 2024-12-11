<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng của bạn</title>

    <!-- Bootstrap CSS -->
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
        footer {
            background-color: #f8f9fa; /* Màu nền của footer */
            padding: 20px 0; /* Khoảng cách bên trên và bên dưới */
            margin-top: 300px;
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
                <a class="nav-link" href="{{ route('order.index') }}"><i class="fas fa-book fa-lgs"></i> Đơn Hàng </a>
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
    <div class="container mt-1">
        <h1 class="text-center my-4">Đơn hàng của bạn</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(count($orders) > 0)
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ number_format($order->total, 2) }} VND</td>
                                <td>{{ ucfirst($order->status) }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td><a href="{{ route('order.detail', $order->id) }}"><button class="btn btn-primary mt-1">Xem chi tiết</button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info" role="alert">
                Bạn chưa có đơn hàng nào.
            </div>
        @endif
    </div>
    <footer>
        <p>&copy; 2024 Trang Mua Bán Máy Hút Mùi. Bảo lưu mọi quyền.</p>
        <p><a href="#">Chính sách bảo mật</a> | <a href="#">Điều khoản sử dụng</a></p>
    </footer>
    <!-- Bootstrap JS + Popper -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
