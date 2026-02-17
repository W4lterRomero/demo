<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('motos', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Moto #1
            $table->string('brand'); // Honda
            $table->string('model'); // CRF250
            $table->enum('status', ['disponible', 'en_uso', 'mantenimiento'])->default('disponible');
            $table->integer('km')->default(0);
            $table->date('last_service')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('motos');
    }
};
