<?php

namespace Database\Seeders\Product;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'name' => 'Smartphone',
                'unit_price' => 3000000,
                'sale_price' => 2500000,
                'image' => null,
                'status' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Laptop',
                'unit_price' => 8000000,
                'sale_price' => 7500000,
                'image' => null,
                'status' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Kemeja',
                'unit_price' => 150000,
                'sale_price' => 120000,
                'image' => null,
                'status' => true,
            ],
            [
                'category_id' => 3,
                'name' => 'Roti',
                'unit_price' => 25000,
                'sale_price' => 20000,
                'image' => null,
                'status' => false, // true = active fale nactive
            ],
            [
                'category_id' => 5,
                'name' => 'Setrika',
                'unit_price' => 200000,
                'sale_price' => 175000,
                'image' => null,
                'status' => true,
            ],
        ]);
    }
}
