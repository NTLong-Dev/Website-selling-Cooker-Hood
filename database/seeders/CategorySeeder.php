<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Máy hút mùi', 'manufacturer' => 'Electrolux'],
            ['name' => 'Máy hút mùi', 'manufacturer' => 'Teka'],
            ['name' => 'Máy hút mùi', 'manufacturer' => 'Bosch'],
            ['name' => 'Máy hút mùi', 'manufacturer' => 'Sunhouse'],
            ['name' => 'Máy hút mùi', 'manufacturer' => 'Fandi'],
        ]);
    }
}
