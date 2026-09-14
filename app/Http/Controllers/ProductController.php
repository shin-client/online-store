<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::with(['category', 'user']);

        // Filter by Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by Category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by Price Range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', (float) $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', (float) $request->max_price);
        }

        // Sorting
        match ($request->input('sort')) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            default => $query->latest(),
        };

        return view('products.index', [
            'title' => 'Products - Online Store',
            'subtitle' => 'Curated selection of products for you.',
            'products' => $query->paginate(12)->withQueryString(),
            'categories' => Category::withCount('products')->get(),
        ]);
    }

    public function show(int $id): View
    {
        $product = Product::with(['category', 'user'])->findOrFail($id);

        return view('products.show', [
            'title' => $product->name.' - Online Store',
            'subtitle' => $product->name.' - Product details.',
            'product' => $product,
        ]);
    }

    public function create(): View
    {
        return view('products.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        Product::create(array_merge($request->validated(), [
            'user_id' => auth()->id(),
        ]));

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function edit(string $id): View
    {
        return view('products.edit', [
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

        return view('products.trash', compact('products'));
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
