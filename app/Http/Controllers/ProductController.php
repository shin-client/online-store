<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProductController extends Controller
{
    // dummy data
    public static array $products = [
        [
            'id' => 1,
            'name' => 'TV',
            'description' => 'Best Smart TV 4K Ultra HD with HDR10+ and Dolby Atmos support.',
            'image' => 'TV.jpg',
            'icon' => 'tv',
            'price' => 2000,
            'category' => 'Electronics',
        ],
        [
            'id' => 2,
            'name' => 'iPhone',
            'description' => 'Best iPhone with Super Retina XDR display and advanced camera system.',
            'image' => 'iPhone.jpeg',
            'icon' => 'smartphone',
            'price' => 1500,
            'category' => 'Tech',
        ],
        [
            'id' => 3,
            'name' => 'Chromecast',
            'description' => 'Best Chromecast for 4K streaming with Google TV remote.',
            'image' => 'Chromecast.jpeg',
            'icon' => 'cast',
            'price' => 300,
            'category' => 'Electronics',
        ],
        [
            'id' => 4,
            'name' => 'Glasses',
            'description' => 'Best Smart Glasses with built-in open-ear directional audio.',
            'image' => 'Glasses.jpeg',
            'icon' => 'glasses',
            'price' => 500,
            'category' => 'Accessories',
        ],
    ];

    public function index(): View
    {
        return view('products', [
            'title' => 'Danh sách sản phẩm - Online Store',
            'subtitle' => 'Danh sách sản phẩm chọn lọc dành cho bạn.',
            'products' => self::$products,
        ]);
    }

    public function show(int $id): View
    {
        $product = collect(self::$products)->firstWhere('id', $id) ?? abort(404); // get product id, if not found will be show 404 page

        return view('product-detail', [
            'title' => $product['name'].' - Online Store',
            'subtitle' => $product['name'].' – Thông tin chi tiết sản phẩm.',
            'product' => $product,
        ]);
    }
}
