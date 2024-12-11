<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Đơn hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    </style>
</head>
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
        .sidebar a, .sidebar button {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 0; /* Loại bỏ border-radius */
        }
        .sidebar a:hover, .sidebar button:hover {
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

<div class="container mt-5">
    <!-- Page title -->
    <h1 class="text-center mb-4">Quản Lý Đơn hàng</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Orders Table -->
    <div class="card">
        <div class="card-header bg-secondary">
            <h5 class="mb-0" style="color:white;">Danh sách đơn hàng</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên người dùng</th>
                        <th>Tổng tiền</th>
                        <th>Phương thức thanh toán</th>
                        <th>Hành động</th>
                        <th scope="col">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($orders as $order)
            <tr>
                <!-- Hiển thị ID của đơn hàng -->
                <td>{{ $order->id }}</td>
                
                <!-- Hiển thị tên của người dùng liên kết với đơn hàng -->
                <td>{{ $order->user->name }}</td>
                
                <!-- Hiển thị tổng giá trị của đơn hàng, định dạng số với 2 chữ số thập phân và thêm đơn vị VND -->
                <td>{{ number_format($order->total, 2) }} VND</td>
                
                <!-- Hiển thị phương thức thanh toán của đơn hàng -->
                <td>{{ $order->payment_method }}</td>
                
                <td>
                    <!-- Biểu mẫu để cập nhật trạng thái đơn hàng -->
                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                        @csrf <!-- Thêm token CSRF để bảo vệ khỏi tấn công CSRF -->
                        @method('PATCH') <!-- Chỉ định phương thức PATCH cho việc cập nhật -->

                        <!-- Dropdown chọn trạng thái đơn hàng, tự động gửi biểu mẫu khi thay đổi -->
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <!-- Tùy chọn cho trạng thái 'Đang xử lý', đánh dấu là được chọn nếu trạng thái hiện tại là 'processing' -->
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                            
                            <!-- Tùy chọn cho trạng thái 'Đã thanh toán', đánh dấu là được chọn nếu trạng thái hiện tại là 'paid' -->
                            <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Đã thanh toán</option>
                            
                            <!-- Tùy chọn cho trạng thái 'Đã hủy', đánh dấu là được chọn nếu trạng thái hiện tại là 'cancelled' -->
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                        </select>
                    </form>
                </td>
                <td><a href="{{ route('admin.detail', $order->id) }}"><button class="btn btn-primary mt-1">Xem chi tiết</button></a></td>
            </tr>
        @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
