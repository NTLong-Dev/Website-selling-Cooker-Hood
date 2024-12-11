<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách User</title>
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

    <div class="content">
        <h1 class="mb-4">Danh Sách Người Dùng</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Người Dùng</th>
                    <th>Email</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Quay lại quản trị</a>
    </div>

    <!-- Thêm liên kết tới Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
