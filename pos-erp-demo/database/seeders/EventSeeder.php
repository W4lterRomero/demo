<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::create([
            'client_name' => 'Empresa Tech SA de CV',
            'type' => 'corporativo',
            'date' => now()->addDays(5),
            'guests' => 45,
            'venue' => 'salon_a',
            'deposit' => 200.00,
            'checklist' => ['decoracion' => true, 'comida' => true, 'bebidas' => false],
            'staff' => ['meseros' => ['Juan', 'Pedro'], 'seguridad' => ['Carlos']],
            'status' => 'confirmado',
        ]);

        Event::create([
            'client_name' => 'Boda Familia Rivera',
            'type' => 'boda',
            'date' => now()->addDays(15),
            'guests' => 120,
            'venue' => 'ambos',
            'deposit' => 500.00,
            'checklist' => ['decoracion' => false, 'sonido' => true],
            'status' => 'pendiente',
        ]);
    }
}
