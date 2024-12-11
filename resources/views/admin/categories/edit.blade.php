<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Category</title>
    <!-- Thêm liên kết tới Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            border-radius: 0;
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

    <div class="content">
        <h1 class="mb-4">Chỉnh sửa Category</h1>
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="manufacturer">Tên Hãng Sản Xuất</label>
                <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ $category->manufacturer }}" placeholder="Nhập tên hãng sản xuất" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
        </form>
    </div>

    <!-- Thêm liên kết tới Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
