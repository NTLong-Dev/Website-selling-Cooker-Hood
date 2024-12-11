<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>

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
        footer {
            background-color: #f8f9fa; /* Màu nền của footer */
            padding: 20px 0; /* Khoảng cách bên trên và bên dưới */
            margin-top: 200px; /* Khoảng cách trên */
            text-align: center; /* Căn giữa nội dung footer */
        }
        footer p {
            margin: 0; /* Bỏ khoảng cách mặc định */
            color: #6c757d; /* Màu chữ */
        }
        .card {
            margin-bottom: 20px; /* Khoảng cách giữa các card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Hiệu ứng bóng */
        }
        .btn-secondary {
            background-color: #6c757d; /* Màu nền nút */
            border: none; /* Bỏ viền */
        }
        .btn-secondary:hover {
            background-color: #5a6268; /* Màu nền khi hover */
        }
        table {
            background-color: white; /* Màu nền bảng */
        }
        th, td {
            text-align: center; /* Căn giữa nội dung bảng */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('index') }}">
        <img src="https://canaval.com.vn/wp-content/uploads/2021/11/z2900923254304_405bf8eb4df0edd57e76840b1dc3af03-removebg-preview.png" alt="">
    </a>
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
<div class="container mt-4">
    <h1 class="text-center my-4">Chi tiết đơn hàng</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card p-3">
                <h4>Thông tin đơn hàng</h4>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Tổng tiền:</strong> {{ number_format($order->total, 2) }} VND</li>
                    <li class="list-group-item"><strong>Trạng thái:</strong> {{ ucfirst($order->status) }}</li>
                    <li class="list-group-item"><strong>Ngày tạo:</strong> {{ $order->created_at }}</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3">
                <h4>Sản phẩm trong đơn hàng</h4>
                @if($order->items->count() > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->price, 2) }} VND</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info" role="alert">
                        Không có sản phẩm nào trong đơn hàng.
                    </div>
                @endif
            </div>
        </div>
    </div>
	<a href="{{ route('order.index') }}" class="btn btn-secondary mt-0">Quay lại danh sách đơn hàng</a>
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
