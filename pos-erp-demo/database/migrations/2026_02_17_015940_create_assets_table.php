<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('category', ['utensilios', 'mobiliario', 'equipos']);
            $table->integer('quantity');
            $table->integer('expected'); // cantidad esperada
            $table->integer('counted')->nullable(); // última auditoría
            $table->string('responsible')->nullable();
            $table->date('last_audit')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
