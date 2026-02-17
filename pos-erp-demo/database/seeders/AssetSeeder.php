<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    public function run(): void
    {
        $assets = [
            ['name' => 'Cucharas soperas', 'category' => 'utensilios', 'quantity' => 100, 'expected' => 100, 'counted' => 95, 'responsible' => 'Jefe Cocina'],
            ['name' => 'Platos trinche', 'category' => 'utensilios', 'quantity' => 200, 'expected' => 200, 'counted' => 198, 'responsible' => 'Jefe Cocina'],
            ['name' => 'Sillas plásticas', 'category' => 'mobiliario', 'quantity' => 50, 'expected' => 50, 'counted' => 50, 'responsible' => 'Admin Salón'],
            ['name' => 'Mesas plegables', 'category' => 'mobiliario', 'quantity' => 20, 'expected' => 20, 'counted' => 20, 'responsible' => 'Admin Salón'],
            ['name' => 'Licuadora Industrial', 'category' => 'equipos', 'quantity' => 2, 'expected' => 2, 'counted' => 2, 'responsible' => 'Jefe Cocina'],
        ];

        foreach ($assets as $asset) {
            Asset::create($asset);
        }
    }
}
