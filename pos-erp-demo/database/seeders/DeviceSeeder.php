<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\User;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    public function run(): void
    {
        $cajero = User::where('email', 'cajero@demo.com')->first();
        
        if ($cajero) {
            Device::create([
                'user_id' => $cajero->id,
                'name' => 'iPad Caja 1',
                'last_seen' => now()->subMinutes(5),
                'status' => 'activo',
            ]);
        }
        
        Device::create([
            'user_id' => null,
            'name' => 'Tablet Cocina',
            'last_seen' => now()->subHours(2),
            'status' => 'activo',
        ]);
    }
}
