<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\User;

test('guests can view products list and product detail', function () {
    $category = Category::create(['name' => 'General', 'slug' => 'general']);
    $product = Product::create([
        'name' => 'Sample Product',
        'slug' => 'sample-product',
        'price' => 100,
        'stock_quantity' => 10,
        'category_id' => $category->id,
    ]);

    $this->get(route('products.index'))->assertOk();
    $this->get(route('products.show', $product->id))->assertOk();
});

test('guests are redirected to login when visiting create page', function () {
    $response = $this->get(route('products.create'));

    $response->assertRedirect(route('login'));
});

test('authenticated users can access create product page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('products.create'));

    $response->assertOk();
});

test('navigation displays correct links for guest and authenticated user', function () {
    $guestResponse = $this->get(route('home'));
    $guestResponse->assertSee('Log in');
    $guestResponse->assertSee('Register');
    $guestResponse->assertDontSee('Add Product');

    $user = User::factory()->create(['name' => 'Nguyen Van A']);
    $authResponse = $this->actingAs($user)->get(route('home'));
    $authResponse->assertSee('Hi, Nguyen Van A');
    $authResponse->assertSee('Dashboard');
    $authResponse->assertSee('Profile');
    $authResponse->assertSee('Log out');
});

test('authenticated user creating product automatically assigns user_id', function () {
    $user = User::factory()->create();
    $category = Category::create(['name' => 'Tech', 'slug' => 'tech']);

    $response = $this->actingAs($user)->post(route('products.store'), [
        'name' => 'Awesome Gadget',
        'slug' => 'awesome-gadget',
        'price' => 299.99,
        'stock_quantity' => 15,
        'category_id' => $category->id,
    ]);

    $response->assertRedirect(route('products.index'));
    $this->assertDatabaseHas('products', [
        'name' => 'Awesome Gadget',
        'user_id' => $user->id,
    ]);
});
