<?php

use App\Models\User;

test('guests are redirected to login when visiting dashboard', function () {
    $response = $this->get('/dashboard');

    $response->assertRedirect('/login');
});

test('authenticated users can access dashboard with store stats', function () {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertOk();
    $response->assertSee('Dashboard');
    $response->assertSee('John Doe');
    $response->assertSee('Your Products');
    $response->assertSee('Store Catalog');
});
