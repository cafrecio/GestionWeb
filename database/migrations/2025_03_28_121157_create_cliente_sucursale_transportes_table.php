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
        Schema::create('cliente_sucursale_transportes', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_id');
            $table->foreignId('sucursal_id')->constrained('sucursales');
            $table->foreignId('sucursal_transporte_id')->constrained('sucursal_transportes');
            $table->boolean('activo')->default(true);
            $table->timestamps();
            
            $table->foreign('cliente_id')->references('codigoCli')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente_sucursale_transportes');
    }
};
