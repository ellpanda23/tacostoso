<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Coca-Cola',
            'slug' => 'coca-cola',
            'description' => 'Coca cola',
            'cost' => 20.0,
            'status' => Product::AVAILABLE,
            'category_id' => 1
        ]);
    }
}
