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
        Schema::create('sucursal_transportes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transporte_id')->constrained('transportes'); // Tabla explícita
            $table->string('nombre');
            $table->text('direccion');
            
            // Corrección clave foránea:
            $table->unsignedBigInteger('localidade_id'); // Nombre exacto de la columna
            $table->foreign('localidade_id')
                  ->references('id')
                  ->on('localidades') // Nombre correcto de la tabla
                  ->onDelete('cascade');
            
            $table->string('telefono');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sucursal_transportes');
    }
};
