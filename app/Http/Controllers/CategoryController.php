<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Hiển thị danh sách các category
    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $categories = Category::all();
            return view('admin.categories.index', compact('categories')); 
        }
        $categories = Category::all(); 
        return view('categories.index', compact('categories')); 
    }

    // Hiển thị form thêm category mới
    public function create()
    {
        return view('admin.categories.create'); 
    }

    // Lưu category mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'manufacturer' => 'required|string|max:255',
        ]);

        // Tạo mới category
        Category::create([
            'name' => 'Máy hút mùi',
            'manufacturer' => $request->manufacturer,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được thêm thành công.');
    }

    // Hiển thị chi tiết một category
    public function show($id)
    {
                if (Auth::check() && Auth::user()->role === 'admin') {
                    $category = Category::with('products')->findOrFail($id);
        
                    return view('admin.categories.show', [
                        'category' => $category,
                        'products' => $category->products
                    ]);
                }
                $category = Category::with('products')->findOrFail($id);
        
                return view('categories.show', [
                    'category' => $category,
                    'products' => $category->products
                ]);

    }

    // Hiển thị form chỉnh sửa category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Cập nhật category trong cơ sở dữ liệu
    public function update(Request $request, $id)
    {
        $request->validate([
            'manufacturer' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => 'Máy hút mùi',
            'manufacturer' => $request->manufacturer,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được sửa thành công.');
    }

    // Xóa một category
    public function destroy($id)
    {
        $category = Category::findOrFail($id); 
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được xoá thành công.');
    }
}
