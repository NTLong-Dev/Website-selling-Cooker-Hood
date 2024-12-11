<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <!-- Thêm liên kết tới Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container mt-4">
        <h1 class="mb-4">Chỉnh sửa sản phẩm</h1>

        <!-- Form để cập nhật sản phẩm -->
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Tên sản phẩm -->
            <div class="form-group">
                <label for="name">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>

            <!-- Mô tả sản phẩm -->
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $product->description }}</textarea>
            </div>

            <!-- Số lượng sản phẩm -->
            <div class="form-group">
                <label for="quantity">Số lượng</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" min="1" required>
            </div>

            <!-- Giá sản phẩm -->
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" step="0.01" min="0" required>
            </div>

            <!-- Danh mục sản phẩm -->
            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="" disabled>Chọn danh mục</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->manufacturer }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nút cập nhật -->
            <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
           
        </form>
        <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>

    <!-- Thêm liên kết tới Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
