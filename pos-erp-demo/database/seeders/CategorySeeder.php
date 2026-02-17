<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Desayunos', 'icon' => '🍳', 'sort_order' => 1],
            ['name' => 'Almuerzos', 'icon' => '🍛', 'sort_order' => 2],
            ['name' => 'Bebidas', 'icon' => '🥤', 'sort_order' => 3],
            ['name' => 'Postres', 'icon' => '🍰', 'sort_order' => 4],
            ['name' => 'Turismo', 'icon' => '🏍️', 'sort_order' => 5],
            ['name' => 'Eventos', 'icon' => '🎉', 'sort_order' => 6],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
