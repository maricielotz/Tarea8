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
        Schema::create('inquilino_alquiler', function (Blueprint $table) {
            $table->foreignId('inquilino_id')->constrained('inquilinos')->onDelete('cascade');
            $table->foreignId('alquiler_id')->constrained('alquileres')->onDelete('cascade');
            $table->primary(['inquilino_id','alquiler_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquilino_alquiler');
    }
};
