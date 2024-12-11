<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
            margin-top: 100px; /* Thêm khoảng cách từ trên xuống */
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-secondary{
            width: 420px;
        }
        .btn-danger{
            width: 420px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="my-4 text-center">Đăng Nhập</h2>
            <form action="login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
            </form>
            <div class="mt-3 text-center">
                <a href="{{ route('register') }}" class="btn btn-danger">Đăng Ký</a>
            </div>
            <div class="mt-3 text-center">
                <a href="{{ route('index') }}" class="btn btn-secondary">Quay Lại</a>
            </div>
        </div>  
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
