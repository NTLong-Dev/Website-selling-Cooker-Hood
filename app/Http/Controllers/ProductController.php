<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     */
    public function index($id)
{
    $product = Product::findOrFail($id);
    return view('products.index', compact('product'));
    
}


    /**
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        $selectedCategoryId = $request->query('category_id');

        return view('admin.products.create', [
            'categories' => $categories,
            'selectedCategoryId' => $selectedCategoryId
        ]);
    }

    /**
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($request->all());
        return redirect()->route('admin.categories.index');
    }   
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);
        $categoryId = $product->category_id;
        $product->update($request->all());
        return redirect()->route('admin.categories.show', ['category' => $categoryId])
                         ->with('success', 'Sản phẩm đã được sửa thành công.');
        
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $categoryId = $product->category_id;
        $product->delete();
        return redirect()->route('admin.categories.show', ['category' => $categoryId])
                         ->with('success', 'Sản phẩm đã được xóa thành công.');
    }
}
    