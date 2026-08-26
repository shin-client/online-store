<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products', [
            'title' => 'Products - Online Store',
            'subtitle' => 'Curated selection of products for you.',
            'products' => Product::with('category')->latest()->paginate(10),
        ]);
    }

    public function show(int $id): View
    {
        $product = Product::with('category')->findOrFail($id);

        return view('product-detail', [
            'title' => $product->name.' - Online Store',
            'subtitle' => $product->name.' - Product details.',
            'product' => $product,
        ]);
    }

    public function create(): View
    {
        return view('product-create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function edit(string $id): View
    {
        return view('product-edit', [
            'product' => Product::findOrFail($id),
            'categories' => Category::all(),
        ]);
    }

    public function update(StoreProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product moved to trash successfully!');
    }

    public function trash(): View
    {
        $products = Product::onlyTrashed()->latest()->paginate(10);

        return view('product-trash', compact('products'));
    }

    public function restore(string $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('products.trash')->with('success', 'Product restored successfully!');
    }

    public function forceDelete(string $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();

        return redirect()->route('products.trash')->with('success', 'Product permanently deleted successfully!');
    }
}
