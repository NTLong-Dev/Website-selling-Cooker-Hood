<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\DB; 

class reportController extends Controller
{
    public function index() 
{
    // Thống kê tổng doanh thu theo từng danh mục
    $categoryRevenue = DB::table('order_items')
        ->select('products.category_id', DB::raw('SUM(order_items.price * order_items.quantity) as total_revenue'))
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->join('orders', 'order_items.order_id', '=', 'orders.id')
        ->where('orders.status', 'paid')
        ->groupBy('products.category_id')
        ->get();

    // Tổng số đơn hàng
    $totalOrders = Orders::count();

    // Tổng số khách hàng
    $totalCustomers = DB::table('users')->where('role', 'customers')->count();

    // Doanh thu theo ngày từ bảng payments
    $revenueByDate = DB::table('payments')
        ->select(DB::raw('DATE(payment_date) as date, SUM(amount) as total_revenue'))
        ->groupBy('date')
        ->get();

    // Doanh thu theo tháng từ bảng payments
    $revenueByMonth = DB::table('payments')
        ->select(DB::raw('MONTH(payment_date) as month, SUM(amount) as total_revenue'))
        ->groupBy('month')
        ->get();

    // Doanh thu theo năm từ bảng payments
    $revenueByYear = DB::table('payments')
        ->select(DB::raw('YEAR(payment_date) as year, SUM(amount) as total_revenue'))
        ->groupBy('year')
        ->get();

    // Doanh thu theo phương thức thanh toán
    $revenueByPaymentMethod = DB::table('payments')
        ->select('payment_method', DB::raw('SUM(amount) as total_revenue'))
        ->groupBy('payment_method')
        ->get();
        return view('admin.dashboard', compact(
            'totalOrders', 
            'totalCustomers', 
            'categoryRevenue', 
            'revenueByDate', 
            'revenueByMonth', 
            'revenueByYear', 
            'revenueByPaymentMethod'
        ));
}
}
