<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Cajero Demo',
                'email' => 'cajero@demo.com',
                'password' => 'password',
                'pin' => '1234',
                'role' => 'cajero',
                'demo_package' => 'basico',
            ],
            [
                'name' => 'Administrador Demo',
                'email' => 'admin@demo.com',
                'password' => 'password',
                'pin' => '5678',
                'role' => 'administrador',
                'demo_package' => 'completo',
            ],
            [
                'name' => 'Propietario Demo',
                'email' => 'propietario@demo.com',
                'password' => 'password',
                'pin' => '9999',
                'role' => 'administrador', // Propietario is essentially admin but with more access in demo logic
                'demo_package' => 'premium',
            ],
            // Additional users for "Users Management" demo
            [
                'name' => 'Juan Pérez',
                'email' => 'juan@demo.com',
                'password' => 'password',
                'pin' => '1111',
                'role' => 'cocina',
                'demo_package' => null,
            ],
             [
                'name' => 'María Rodríguez',
                'email' => 'maria@demo.com',
                'password' => 'password',
                'pin' => '2222',
                'role' => 'guia',
                'demo_package' => null,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
