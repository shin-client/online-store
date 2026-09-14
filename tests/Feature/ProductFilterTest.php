<?php

use App\Models\Category;
use App\Models\Product;

test('products can be filtered by category', function () {
    $electronics = Category::create(['name' => 'Electronics Filter Test', 'slug' => 'electronics-test']);
    $accessories = Category::create(['name' => 'Accessories Filter Test', 'slug' => 'accessories-test']);

    Product::create([
        'name' => 'Headphones Item',
        'slug' => 'headphones-item',
        'price' => 120,
        'stock_quantity' => 5,
        'category_id' => $electronics->id,
    ]);

    Product::create([
        'name' => 'Sunglasses Item',
        'slug' => 'sunglasses-item',
        'price' => 50,
        'stock_quantity' => 10,
        'category_id' => $accessories->id,
    ]);

    $response = $this->get(route('products.index', ['category' => $electronics->id]));
    $response->assertOk();
    $response->assertSee('Headphones Item');
    $response->assertDontSee('Sunglasses Item');
});

test('products can be filtered by manual price range', function () {
    $category = Category::first() ?? Category::create(['name' => 'Test Cat', 'slug' => 'test-cat']);

    Product::create([
        'name' => 'Cheap Item',
        'slug' => 'cheap-item',
        'price' => 25.00,
        'stock_quantity' => 5,
        'category_id' => $category->id,
    ]);

    Product::create([
        'name' => 'Expensive Item',
        'slug' => 'expensive-item',
        'price' => 5000.00,
        'stock_quantity' => 5,
        'category_id' => $category->id,
    ]);

    $response = $this->get(route('products.index', ['min_price' => 1000, 'max_price' => 6000]));
    $response->assertOk();
    $response->assertSee('Expensive Item');
    $response->assertDontSee('Cheap Item');
});

test('products can be filtered by search term', function () {
    $category = Category::first() ?? Category::create(['name' => 'Test Cat', 'slug' => 'test-cat']);

    Product::create([
        'name' => 'Unique Gadget X',
        'slug' => 'unique-gadget-x',
        'price' => 100,
        'stock_quantity' => 5,
        'category_id' => $category->id,
    ]);

    $response = $this->get(route('products.index', ['search' => 'Unique Gadget X']));
    $response->assertOk();
    $response->assertSee('Unique Gadget X');
});
