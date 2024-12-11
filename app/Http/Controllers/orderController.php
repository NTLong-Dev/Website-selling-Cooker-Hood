<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItems;
use App\Models\Payment;

class orderController extends Controller
{
    public function index()
    {
        $orders = Orders::where('user_id', Auth::id())->get();
        return view('orders', compact('orders'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn trống.');
        }

        $order = Orders::create([
            'user_id' => Auth::id(),
            'total' => $request->total,
            'status' => 'processing',
            'payment_method' => $request->payment_method,
        ]);
        Payment::create([
            'order_id' => $order->id,
            'amount' => $order->total,
            'payment_method' => $order->payment_method,
        ]);
        foreach ($cart as $id => $details) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }
        session()->forget('cart');

        return redirect()->route('order.index')->with('success', 'Đặt hàng thành công!');
    }
    public function detail($id)
        {
    $order = Orders::with('items.product')->where('id', $id)->firstOrFail();
    return view('backend.detail', compact('order'));
    }
}
