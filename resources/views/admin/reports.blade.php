<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo cáo doanh thu</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-top{
            transform: translateY(-30px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Báo cáo doanh thu</h1>
        
        <div class="mt-4 row">
            <div class="col-md-6">
                <h4>Tổng số đơn hàng: <span class="badge bg-primary">{{ $totalOrders }}</span></h4>
            </div>
            <div class="col-md-6">
                <h4>Tổng số khách hàng: <span class="badge bg-success">{{ $totalCustomers }}</span></h4>
            </div>
        </div>

        <div class="my-5">
            <h3>Doanh thu theo từng danh mục</h3>
            <canvas id="categoryRevenueChart" class="w-100"></canvas>
        </div>

        <div class="my-5">
            <h3>Doanh thu theo ngày</h3>
            <canvas id="revenueByDateChart" class="w-100"></canvas>
        </div>

        <div class="my-5">
            <h3>Doanh thu theo tháng</h3>
            <canvas id="revenueByMonthChart" class="w-100"></canvas>
        </div>

        <div class="my-5">
            <h3>Doanh thu theo năm</h3>
            <canvas id="revenueByYearChart" class="w-100"></canvas>
        </div>

        <div class="my-5">
            <h3>Doanh thu theo phương thức thanh toán</h3>
            <canvas id="revenueByPaymentMethodChart" class="w-100"></canvas>
        </div>

    </div>

    <!-- Bootstrap JS and dependencies (Popper.js and Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Biểu đồ doanh thu theo từng danh mục
        // Lấy danh sách tên danh mục và doanh thu tương ứng từ dữ liệu backend (Laravel)
        var categoryLabels = @json($categoryRevenue->pluck('category_id'));  // Danh sách các ID danh mục
        var categoryData = @json($categoryRevenue->pluck('total_revenue'));  // Danh sách tổng doanh thu theo từng danh mục
        
        // Tạo biểu đồ cột (bar chart) để hiển thị doanh thu theo danh mục
        var ctx1 = document.getElementById('categoryRevenueChart').getContext('2d');
        var categoryRevenueChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: categoryLabels,  // Gán tên danh mục vào trục X
                datasets: [{
                    label: 'Doanh thu',
                    data: categoryData,  // Gán doanh thu vào trục Y
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',  // Màu nền cột
                    borderColor: 'rgba(54, 162, 235, 1)',  // Màu viền cột
                    borderWidth: 1  // Độ dày viền
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true  // Đặt trục Y bắt đầu từ 0
                    }
                }
            }
        });

        // Biểu đồ doanh thu theo ngày
        // Lấy danh sách các ngày và tổng doanh thu từng ngày từ backend
        var dateLabels = @json($revenueByDate->pluck('date'));  // Danh sách ngày
        var dateData = @json($revenueByDate->pluck('total_revenue'));  // Tổng doanh thu theo ngày
        
        // Tạo biểu đồ đường (line chart) để hiển thị doanh thu theo ngày
        var ctx2 = document.getElementById('revenueByDateChart').getContext('2d');
        var revenueByDateChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: dateLabels,  // Gán các ngày vào trục X
                datasets: [{
                    label: 'Doanh thu theo ngày',
                    data: dateData,  // Gán tổng doanh thu vào trục Y
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Màu nền đường biểu đồ
                    borderColor: 'rgba(75, 192, 192, 1)',  // Màu viền đường biểu đồ
                    borderWidth: 1,  // Độ dày viền
                    fill: true  // Làm đầy phần bên dưới đường biểu đồ
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true  // Đặt trục Y bắt đầu từ 0
                    }
                }
            }
        });

        // Biểu đồ doanh thu theo tháng
        // Lấy dữ liệu từ backend: danh sách tháng và doanh thu tương ứng
        var monthLabels = @json($revenueByMonth->pluck('month'));  // Danh sách các tháng
        var monthData = @json($revenueByMonth->pluck('total_revenue'));  // Tổng doanh thu theo tháng
        
        // Tạo biểu đồ cột (bar chart) để hiển thị doanh thu theo tháng
        var ctx3 = document.getElementById('revenueByMonthChart').getContext('2d');
        var revenueByMonthChart = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: monthLabels,  // Gán tên tháng vào trục X
                datasets: [{
                    label: 'Doanh thu theo tháng',
                    data: monthData,  // Gán tổng doanh thu vào trục Y
                    backgroundColor: 'rgba(153, 102, 255, 0.5)',  // Màu nền cột
                    borderColor: 'rgba(153, 102, 255, 1)',  // Màu viền cột
                    borderWidth: 1  // Độ dày viền
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true  // Đặt trục Y bắt đầu từ 0
                    }
                }
            }
        });

        // Biểu đồ doanh thu theo năm
        // Lấy dữ liệu: danh sách các năm và tổng doanh thu tương ứng
        var yearLabels = @json($revenueByYear->pluck('year'));  // Danh sách các năm
        var yearData = @json($revenueByYear->pluck('total_revenue'));  // Tổng doanh thu theo năm
        
        // Tạo biểu đồ cột (bar chart) hiển thị doanh thu theo năm
        var ctx4 = document.getElementById('revenueByYearChart').getContext('2d');
        var revenueByYearChart = new Chart(ctx4, {
            type: 'bar',
            data: {
                labels: yearLabels,  // Gán tên năm vào trục X
                datasets: [{
                    label: 'Doanh thu theo năm',
                    data: yearData,  // Gán tổng doanh thu vào trục Y
                    backgroundColor: 'rgba(255, 159, 64, 0.5)',  // Màu nền cột
                    borderColor: 'rgba(255, 159, 64, 1)',  // Màu viền cột
                    borderWidth: 1  // Độ dày viền
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true  // Đặt trục Y bắt đầu từ 0
                    }
                }
            }
        });

        // Biểu đồ doanh thu theo phương thức thanh toán
        // Lấy dữ liệu từ backend: phương thức thanh toán và tổng doanh thu tương ứng
        var paymentMethodLabels = @json($revenueByPaymentMethod->pluck('payment_method'));  // Danh sách phương thức thanh toán
        var paymentMethodData = @json($revenueByPaymentMethod->pluck('total_revenue'));  // Tổng doanh thu theo phương thức thanh toán
        
        // Tạo biểu đồ tròn (pie chart) để hiển thị tỷ lệ doanh thu theo phương thức thanh toán
        var ctx5 = document.getElementById('revenueByPaymentMethodChart').getContext('2d');
        var revenueByPaymentMethodChart = new Chart(ctx5, {
            type: 'pie',
            data: {
                labels: paymentMethodLabels,  // Gán phương thức thanh toán vào biểu đồ
                datasets: [{
                    label: 'Doanh thu theo phương thức thanh toán',
                    data: paymentMethodData,  // Gán tổng doanh thu
                    backgroundColor: [  // Màu nền cho mỗi phần của biểu đồ tròn
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    borderColor: [  // Màu viền cho từng phần
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1  // Độ dày viền
                }]
            },
            options: {
                responsive: true,  // Biểu đồ tự điều chỉnh kích thước theo khung chứa
                plugins: {
                    legend: {
                        position: 'top',  // Vị trí hiển thị chú thích
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                // Hiển thị doanh thu với định dạng số
                                return context.label + ': ' + new Intl.NumberFormat().format(context.raw) + ' VND';
                            }
                        }
                    }
                }
            }
        });
    });
    </script>
</body>
</html>