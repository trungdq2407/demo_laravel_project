<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Movie 1',
                'thumbnail' => 'maxresdefault.jpg',
                'price' => 19.99,
            ],
            [
                'name' => 'Movie 2',
                'thumbnail' => 'pic1.jpg',
                'price' => 29.99,
            ],
            [
                'name' => 'Movie 3',
                'thumbnail' => 'pic2.jpg',
                'price' => 19.99,
            ],
            [
                'name' => 'Movie 4',
                'thumbnail' => 'pic3.jpg',
                'price' => 29.99,
            ],
        ];

        // Seed products into the database
        foreach ($products as $product) {
            Products::create($product);
        }
    }
}
