<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Category</title>
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
        <h1 class="mb-4">Danh Sách Danh Mục</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Thêm danh mục mới</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Category</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->manufacturer }}</td>
                        <td>
                            <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.products.create', ['category_id' => $category->id]) }}" class="btn btn-info">Thêm sản phẩm</a>
    </div>

    <!-- Thêm liên kết tới Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
