<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('moto_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('moto_id')->constrained('motos')->cascadeOnDelete();
            $table->string('client_name');
            $table->string('phone');
            $table->date('date');
            $table->time('time_start');
            $table->time('time_end');
            $table->decimal('deposit', 10, 2)->default(0);
            $table->enum('status', ['pendiente', 'confirmada', 'completada', 'cancelada'])->default('pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('moto_reservations');
    }
};
