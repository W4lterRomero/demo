<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            InventorySeeder::class,
            UserSeeder::class,
            SaleSeeder::class,
            MotoSeeder::class,
            MotoReservationSeeder::class,
            MotoMaintenanceSeeder::class,
            EventSeeder::class,
            InvoiceSeeder::class,
            AssetSeeder::class,
            ActivityLogSeeder::class,
            DeviceSeeder::class,
        ]);
    }
}
