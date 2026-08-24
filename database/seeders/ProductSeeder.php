<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'TV',
                'description' => 'Best Smart TV 4K Ultra HD with HDR10+ and Dolby Atmos support.',
                'image' => 'TV.jpg',
                'category_name' => 'Electronics',
                'price' => 2000.00,
                'stock_quantity' => 15,
            ],
            [
                'name' => 'iPhone',
                'description' => 'Best iPhone with Super Retina XDR display and advanced camera system.',
                'image' => 'iPhone.jpeg',
                'category_name' => 'Tech',
                'price' => 1500.00,
                'stock_quantity' => 25,
            ],
            [
                'name' => 'Chromecast',
                'description' => 'Best Chromecast for 4K streaming with Google TV remote.',
                'image' => 'Chromecast.jpeg',
                'category_name' => 'Electronics',
                'price' => 300.00,
                'stock_quantity' => 50,
            ],
            [
                'name' => 'Glasses',
                'description' => 'Best Smart Glasses with built-in open-ear directional audio.',
                'image' => 'Glasses.jpeg',
                'category_name' => 'Accessories',
                'price' => 500.00,
                'stock_quantity' => 10,
            ],
        ];

        foreach ($products as $productData) {
            $categoryName = $productData['category_name'];
            unset($productData['category_name']);

            $category = Category::where('name', $categoryName)->firstOrFail();

            Product::updateOrCreate(
                ['name' => $productData['name']],
                array_merge($productData, [
                    'category_id' => $category->id,
                    'slug' => Str::slug($productData['name']),
                ])
            );
        }
    }
}
