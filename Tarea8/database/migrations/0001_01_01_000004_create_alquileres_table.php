<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto', 4,2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->foreignId('departamento_id')->nullable();
            $table->foreignId('inquilino_id')->nullable();
            $table->timestamps();

     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alquileres');
    }
};




