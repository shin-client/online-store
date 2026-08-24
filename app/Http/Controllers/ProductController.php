<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products', [
            'title' => 'Danh sách sản phẩm - Online Store',
            'subtitle' => 'Danh sách sản phẩm chọn lọc dành cho bạn.',
            'products' => Product::with('category')->get(),
        ]);
    }

    public function show(int $id): View
    {
        $product = Product::with('category')->findOrFail($id);

        return view('product-detail', [
            'title' => $product->name.' - Online Store',
            'subtitle' => $product->name.' – Thông tin chi tiết sản phẩm.',
            'product' => $product,
        ]);
    }
}
