<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
    

        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
    
        $cart = session()->get('cart', []);
        
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "category" => $product->category->manufacturer
            ];
        }
    
        session()->put('cart', $cart);
    
        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    
    }
    

    public function update(Request $request, $id)
    {

        if ($request->has('quantity') && $request->quantity > 0) {
            $cart = session()->get('cart');
    
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
    
                return redirect()->route('cart.index')->with('success', 'Giỏ hàng đã được cập nhật!');
            }
        }
    
        return redirect()->route('cart.index')->with('error', 'Cập nhật thất bại!');
    }

    public function remove(Product $product)
    {

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được xoá khỏi giỏ hàng.');
    }
}
