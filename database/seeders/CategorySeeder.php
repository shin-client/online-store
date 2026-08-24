<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'icon' => 'tv'],
            ['name' => 'Tech', 'icon' => 'smartphone'],
            ['name' => 'Accessories', 'icon' => 'glasses'],
        ];

        foreach ($categories as $data) {
            Category::updateOrCreate(
                ['name' => $data['name']],
                [
                    'slug' => Str::slug($data['name']),
                    'icon' => $data['icon'],
                ]
            );
        }
    }
}
