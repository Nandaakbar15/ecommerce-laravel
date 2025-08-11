<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['id_kategori' => 1, 'name' => 'Smartphone', 'description' => 'HP Android terbaru', 'stock' => 10, 'image' => 'smartphone.jpg'],
            ['id_kategori' => 1, 'name' => 'Laptop', 'description' => 'Laptop untuk kerja', 'stock' => 5, 'image' => 'laptop.jpg'],
            ['id_kategori' => 2, 'name' => 'Kaos', 'description' => 'Kaos katun nyaman', 'stock' => 20, 'image' => 'kaos.jpg'],
            ['id_kategori' => 3, 'name' => 'Novel', 'description' => 'Novel best seller', 'stock' => 15, 'image' => 'novel.jpg'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
