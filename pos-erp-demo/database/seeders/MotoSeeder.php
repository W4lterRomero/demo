<?php

namespace Database\Seeders;

use App\Models\Moto;
use Illuminate\Database\Seeder;

class MotoSeeder extends Seeder
{
    public function run(): void
    {
        $motos = [
            [
                'name' => 'Moto #1',
                'brand' => 'Honda',
                'model' => 'CRF250',
                'status' => 'disponible',
                'km' => 12500,
                'last_service' => now()->subMonths(1),
            ],
            [
                'name' => 'Moto #2',
                'brand' => 'Yamaha',
                'model' => 'YZ200',
                'status' => 'en_uso',
                'km' => 8400,
                'last_service' => now()->subMonths(2),
            ],
            [
                'name' => 'Moto #3',
                'brand' => 'Suzuki',
                'model' => 'DR350',
                'status' => 'mantenimiento',
                'km' => 22100,
                'last_service' => now()->subMonths(6),
            ],
            [
                'name' => 'Moto #4',
                'brand' => 'Honda',
                'model' => 'CRF250',
                'status' => 'disponible',
                'km' => 500,
                'last_service' => now()->subWeeks(2),
            ],
            [
                'name' => 'Moto #5',
                'brand' => 'Yamaha',
                'model' => 'Raptor',
                'status' => 'disponible',
                'km' => 3200,
                'last_service' => now()->subMonths(3),
            ],
        ];

        foreach ($motos as $moto) {
            Moto::create($moto);
        }
    }
}
