<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên sản phẩm
            $table->text('description'); // Mô tả sản phẩm
            $table->integer('quantity'); // Số lượng sản phẩm
            $table->decimal('price', 8, 2); // Giá sản phẩm
            $table->foreignId('category_id')->constrained(); // Liên kết với bảng categories
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
