<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\Admin\OrderControllerAdmin;
use App\Http\Controllers\Admin\reportController;

/*  
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Đăng ký người dùng
// Route cho người dùng không cần đăng nhập
Route::get('/', [AuthController::class, 'index'])->name('index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/product/{id}', [ProductController::class, 'index'])->name('product.index');
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
// Đăng nhập người dùng
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
// Đăng xuất người dùng
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route cho dashboard admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [reportController::class, 'index'])->name('dashboard');
    Route::get('/admin/user', [AdminController::class, 'user'])->name('user');
    Route::delete('/admin/user/{id}', [AdminController::class, 'destroy'])->name('destroy');
    Route::resource('/admin/products', ProductController::class, ['as' => 'admin']);
    Route::resource('/admin/categories', CategoryController::class, ['as' => 'admin']);
    Route::get('/admin/order/{id}', [OrderControllerAdmin::class, 'detail'])->name('admin.detail');
    Route::get('/admin/orders', [OrderControllerAdmin::class, 'index'])->name('admin.orders.index');
    Route::patch('/admin/orders/{order}', [OrderControllerAdmin::class, 'updateStatus'])->name('admin.orders.updateStatus');
});

Route::middleware(['auth'])->group(function () {
    // Route cho giỏ hàng
    Route::post('/custumerIndex/add/{product}', [CartController::class, 'add'])->name('cart.add'); // Đã bảo vệ
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/order/{id}', [OrderController::class, 'detail'])->name('order.detail');
    Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('orders', [orderController::class, 'index'])->name('order.index');
    Route::post('orders', [orderController::class, 'store'])->name('order.store');
    Route::get('/momo/atm', function () {
        return view('atm'); 
    })->name('momo.atm');
});
