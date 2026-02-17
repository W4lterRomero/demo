<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('pin', 4)->nullable()->after('password');
            $table->enum('role', ['administrador', 'cajero', 'cocina', 'guia'])->default('cajero')->after('pin');
            $table->enum('demo_package', ['basico', 'completo', 'premium'])->nullable()->after('role');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['pin', 'role', 'demo_package']);
        });
    }
};
