<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('welcome', [
            'title' => 'Online Store - Home',
        ]);
    }

    public function products(): View
    {
        return view('products.index', [
            'title' => 'Products - Online Store',
        ]);
    }

    public function about(): View
    {
        return view('about', [
            'title' => 'About Us - Online Store',
        ]);
    }
}
