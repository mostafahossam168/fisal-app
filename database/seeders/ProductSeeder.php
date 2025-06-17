<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Product 1',
            'product_number' => 1,
            'barcode' => 15564,
            'user_id' => User::first()->id,
            'category_id' => Category::first()->id,
        ]);

        Product::create([
            'name' => 'Product 2',
            'product_number' => 2,
            'barcode' => 15799,
            'user_id' => User::latest()->first()->id,
            'category_id' => Category::latest()->first()->id,
        ]);
    }
}
