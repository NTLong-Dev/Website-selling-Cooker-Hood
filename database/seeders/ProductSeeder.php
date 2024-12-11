<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Máy hút mùi Electrolux EH11', 'description' => 'Máy hút mùi cao cấp Electrolux', 'quantity' => 10, 'price' => 4999.99, 'category_id' => 1],
            ['name' => 'Máy hút mùi Teka DH2', 'description' => 'Thiết kế hiện đại, bền bỉ', 'quantity' => 20, 'price' => 2999.99, 'category_id' => 2],
            ['name' => 'Máy hút mùi Bosch LB90', 'description' => 'Hiệu suất cao, tiết kiệm điện', 'quantity' => 15, 'price' => 7999.99, 'category_id' => 3],
            ['name' => 'Máy hút mùi Sunhouse SHB8', 'description' => 'Giá cả hợp lý, dễ sử dụng', 'quantity' => 25, 'price' => 1999.99, 'category_id' => 4],
            ['name' => 'Máy hút mùi Fandi FD90', 'description' => 'Chất lượng tốt, độ bền cao', 'quantity' => 18, 'price' => 5999.99, 'category_id' => 5],
        ]);
    }
    
}
