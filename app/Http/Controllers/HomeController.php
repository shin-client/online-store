<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('welcome', [
            'title' => 'Online Store - Trang chủ',
        ]);
    }

    public function products(): View
    {
        return view('products', [
            'title' => 'Danh sách sản phẩm - Online Store',
        ]);
    }

    public function about(): View
    {
        return view('about', [
            'title' => 'Giới thiệu - Online Store',
        ]);
    }
}
