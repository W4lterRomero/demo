<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Inventory;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        Product::all()->each(function($product) {
            Inventory::create([
                'product_id' => $product->id,
                'stock' => rand(5, 100),
                'min_stock' => 10,
                'location' => 'Almacén Principal',
            ]);
        });

        // Hacer que algunos productos tengan stock bajo
        Inventory::limit(5)->update(['stock' => rand(3, 9)]);
    }
}
