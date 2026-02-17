<?php

namespace Database\Seeders;

use App\Models\Moto;
use App\Models\MotoReservation;
use Illuminate\Database\Seeder;

class MotoReservationSeeder extends Seeder
{
    public function run(): void
    {
        $motos = Moto::all();
        
        if ($motos->isEmpty()) return;

        // Create 5 varied reservations
        $reservations = [
            [
                'moto_id' => $motos->first()->id,
                'client_name' => 'Carlos López',
                'phone' => '7890-1234',
                'date' => now()->addDays(2),
                'time_start' => '10:00:00',
                'time_end' => '12:00:00',
                'deposit' => 20.00,
                'status' => 'confirmada',
            ],
            [
                'moto_id' => $motos->get(1)->id ?? 1,
                'client_name' => 'Ana Martínez',
                'phone' => '7123-4567',
                'date' => now()->today(),
                'time_start' => '14:00:00',
                'time_end' => '16:00:00',
                'deposit' => 30.00,
                'status' => 'pendiente',
            ],
        ];

        foreach ($reservations as $res) {
            MotoReservation::create($res);
        }
    }
}
