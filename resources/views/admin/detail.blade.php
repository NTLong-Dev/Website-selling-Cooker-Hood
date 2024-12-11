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
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 0;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .btn-green {
            background: green;
            color: white;
        }
        .btn-green:hover {
            background: darkgreen;
        }
        .content {
            flex-grow: 1;
            padding: 20px;  
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="{{ route('dashboard') }}"><h3 class="text-center">Trang Quản Trị</h3></a>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Quản Lý Danh Mục</a>
        <a href="{{ route('user') }}" class="btn btn-green">Quản Lý User</a>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-warning">Quản Lý Đơn Hàng</a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger w-100">Đăng Xuất</button>
        </form>
    </div>

<div class="container mt-4">
    <h1 class="text-center my-4">Chi tiết đơn hàng</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card p-3">
                <h4>Thông tin đơn hàng</h4>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Tổng tiền:</strong> {{ number_format($order->total, 2) }} VND</li>
                    <li class="list-group-item"><strong>Trạng thái:</strong> {{ ucfirst($order->status) }}</li>
                    <li class="list-group-item"><strong>Hình thức thanh toán: </strong>{{ $order->payment_method }}</li> 
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
	<a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-2">Quay lại danh sách đơn hàng</a>
</div>
<!-- Bootstrap JS + Popper -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
