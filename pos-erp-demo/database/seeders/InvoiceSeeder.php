<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Sale;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        $sales = Sale::where('status', 'completada')->limit(10)->get();

        foreach ($sales as $sale) {
            Invoice::create([
                'sale_id' => $sale->id,
                'client_name' => 'Cliente Genérico',
                'nit' => '0614-050680-101-' . rand(1, 9),
                'type' => rand(0, 1) ? 'CCF' : 'FCF',
                'total' => $sale->total,
                'status' => 'aprobada',
                'codigo_generacion' => Str::upper(Str::random(36)),
                'pdf_path' => null, // Would point to a file in storage
            ]);
        }
    }
}
