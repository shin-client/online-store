<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

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
                'category' => 'Electronics',
                'price' => 2000,
                'icon' => 'tv',
            ],
            [
                'name' => 'iPhone',
                'description' => 'Best iPhone with Super Retina XDR display and advanced camera system.',
                'image' => 'iPhone.jpeg',
                'category' => 'Tech',
                'price' => 1500,
                'icon' => 'smartphone',
            ],
            [
                'name' => 'Chromecast',
                'description' => 'Best Chromecast for 4K streaming with Google TV remote.',
                'image' => 'Chromecast.jpeg',
                'category' => 'Electronics',
                'price' => 300,
                'icon' => 'cast',
            ],
            [
                'name' => 'Glasses',
                'description' => 'Best Smart Glasses with built-in open-ear directional audio.',
                'image' => 'Glasses.jpeg',
                'category' => 'Accessories',
                'price' => 500,
                'icon' => 'glasses',
            ],
        ];

        foreach ($products as $productData) {
            // 1. Nếu ĐÃ CÓ sản phẩm tên "TV" trong CSDL ➔ Laravel sẽ Cập nhật (Update) thông tin của TV đó bằng dữ liệu trong mảng $productData.
            // 2. Nếu CHƯA CÓ sản phẩm tên "TV" ➔ Laravel sẽ Tạo mới (Create) bản ghi TV với đầy đủ các trường name, description, image, price.
            Product::updateOrCreate(
                ['name' => $productData['name']], // dieu kien tim kiem vd: TV
                $productData // seed data
            );
        }
    }
}
