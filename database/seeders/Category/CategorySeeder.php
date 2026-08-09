<?php

namespace Database\Seeders\Category;

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
            [
                'name' => 'Elektronik',
                'image' => null,
                'description' => 'Kategori untuk produk elektronik',
            ],
            [
                'name' => 'Pakaian',
                'image' => null,
                'description' => 'Kategori untuk produk pakaian',
            ],
            [
                'name' => 'Makanan',
                'image' => null,
                'description' => 'Kategori untuk produk makanan',
            ],
            [
                'name' => 'Minuman',
                'image' => null,
                'description' => 'Kategori untuk produk minuman',
            ],
            [
                'name' => 'Peralatan Rumah Tangga',
                'image' => null,
                'description' => 'Kategori untuk peralatan rumah tangga',
            ],
        ]);
    }
}
