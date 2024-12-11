<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function user()
    {
        $users = Users::where('role', '!=', 'admin')->get();
        return view('admin.user', compact('users'));
    }
    public function destroy($id)
    {
        $users = Users::findOrFail($id); 
        $users->delete();

        return redirect()->route('user')->with('success', 'Người dùng đã được xoá thành công.');
    }
}
