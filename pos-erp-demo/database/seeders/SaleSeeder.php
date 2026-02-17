<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $cajero = User::where('email', 'cajero@demo.com')->first();
        
        // Generate 50 sales over the last 30 days
        for ($i = 0; $i < 50; $i++) {
            $date = now()->subDays(rand(0, 30))->subHours(rand(0, 12));
            
            // Randomly select 1-5 products
            $selectedProducts = $products->random(rand(1, 5));
            $subtotal = 0;
            $items = [];

            foreach ($selectedProducts as $product) {
                $qty = rand(1, 3);
                $lineTotal = $product->price * $qty;
                $subtotal += $lineTotal;
                
                $items[] = [
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'unit_price' => $product->price,
                    'subtotal' => $lineTotal,
                ];
            }

            $tax = $subtotal * 0.13; // VAT 13%
            $total = $subtotal + $tax;

            $sale = Sale::create([
                'user_id' => $cajero->id ?? 1,
                'package_type' => 'basico',
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total,
                'payment_method' => rand(0, 1) ? 'efectivo' : 'tarjeta',
                'status' => 'completada',
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            foreach ($items as $item) {
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'subtotal' => $item['subtotal'],
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
            }
        }
    }
}
