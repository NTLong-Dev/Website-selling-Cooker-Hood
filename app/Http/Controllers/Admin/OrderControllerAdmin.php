<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
class OrderControllerAdmin extends Controller
{
    public function index()
    {
        $orders = Orders::all();
        
        return view('admin.order', compact('orders'));
    }
    
    public function updateStatus(Request $request, $id)
    {
        $order = Orders::findOrFail($id);
        
        $order->status = $request->status;
        
        $order->save();
    
        return redirect()->route('admin.orders.index')
                         ->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }    
    public function detail($id)
    {
$order = Orders::with('items.product')->where('id', $id)->firstOrFail();
return view('admin.detail', compact('order'));
}
}
    