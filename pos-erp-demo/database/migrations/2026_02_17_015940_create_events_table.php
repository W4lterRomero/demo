<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->enum('type', ['cumpleaños', 'boda', 'corporativo', 'otro']);
            $table->date('date');
            $table->integer('guests');
            $table->enum('venue', ['salon_a', 'terraza', 'ambos']);
            $table->decimal('deposit', 10, 2)->default(0);
            $table->json('checklist')->nullable(); // ['decoracion' => false, 'comida' => true]
            $table->json('staff')->nullable(); // ['meseros' => ['Juan', 'Maria']]
            $table->enum('status', ['pendiente', 'confirmado', 'completado'])->default('pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
