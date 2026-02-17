<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->nullable()->constrained();
            $table->string('client_name');
            $table->string('nit')->nullable();
            $table->enum('type', ['CCF', 'FCF']); // Crédito Fiscal, Consumidor Final
            $table->decimal('total', 10, 2);
            $table->enum('status', ['aprobada', 'rechazada', 'contingencia'])->default('aprobada');
            $table->string('pdf_path')->nullable();
            $table->string('codigo_generacion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
