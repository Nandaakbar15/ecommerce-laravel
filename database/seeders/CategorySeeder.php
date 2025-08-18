<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id_kategori' => 1, 'name' => 'Elektronik', 'quantity' => 12],
            ['id_kategori' => 2, 'name' => 'Pakaian', 'quantity' => 22],
            ['id_kategori' => 3, 'name' => 'Aksesoris', 'quantity' => 14],
            ['id_kategori' => 4, 'name' => 'Makanan', 'quantity' => 17]
        ];

        foreach($categories as $data) {
            Category::create($data);
        }
    }
}
