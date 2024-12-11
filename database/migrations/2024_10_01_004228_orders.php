<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Orders table
    public function up()
    {
        // Tạo bảng 'orders'
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Tạo cột 'id' kiểu tự tăng (auto-increment)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Tạo cột 'user_id' với ràng buộc khóa ngoại, xóa liên quan khi người dùng bị xóa
            $table->decimal('total', 10, 2); // Tạo cột 'total' kiểu số thập phân với tối đa 10 chữ số và 2 chữ số thập phân
            $table->enum('status', ['processing', 'paid', 'cancelled'])->default('processing'); // Tạo cột 'status' với các giá trị: 'processing', 'paid', 'cancelled', mặc định là 'processing'
            $table->enum('payment_method', ['COD', 'online'])->default('COD'); // Tạo cột 'payment_method' với các giá trị: 'COD', 'online', mặc định là 'COD'
            $table->timestamps(); // Tạo cột 'created_at' và 'updated_at' tự động
        });
    }    


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
