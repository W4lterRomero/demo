<?php

namespace Database\Seeders;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Database\Seeder;

class ActivityLogSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $actions = ['Creó venta', 'Editó inventario', 'Cerró caja', 'Inició sesión'];
        $modules = ['POS', 'Inventario', 'Caja', 'Auth'];

        if ($users->isEmpty()) return;

        for ($i = 0; $i < 20; $i++) {
            $user = $users->random();
            $idx = rand(0, 3);
            
            ActivityLog::create([
                'user_id' => $user->id,
                'action' => $actions[$idx],
                'module' => $modules[$idx],
                'details' => 'Acción realizada por demo user',
                'ip' => '192.168.1.' . rand(10, 50),
                'created_at' => now()->subHours(rand(1, 48)),
            ]);
        }
    }
}
