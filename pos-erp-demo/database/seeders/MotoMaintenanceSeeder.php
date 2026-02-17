<?php

namespace Database\Seeders;

use App\Models\Moto;
use App\Models\MotoMaintenance;
use Illuminate\Database\Seeder;

class MotoMaintenanceSeeder extends Seeder
{
    public function run(): void
    {
        $moto = Moto::where('status', 'mantenimiento')->first();
        
        if ($moto) {
            MotoMaintenance::create([
                'moto_id' => $moto->id,
                'type' => 'general',
                'scheduled_date' => now()->subDays(1),
                'completed_at' => null,
                'notes' => 'Revisión general de transmisión y frenos',
            ]);
        }
        
        // History
        $otherMoto = Moto::where('status', '!=', 'mantenimiento')->first();
        if ($otherMoto) {
            MotoMaintenance::create([
                'moto_id' => $otherMoto->id,
                'type' => 'aceite',
                'scheduled_date' => now()->subMonths(1),
                'completed_at' => now()->subMonths(1)->addHours(2),
                'notes' => 'Cambio de aceite estándar',
            ]);
        }
    }
}
