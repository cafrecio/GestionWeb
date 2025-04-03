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
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_id');
            $table->string('nombre');
            $table->text('direccion');
            
            // Error original: Columna mal nombrada
            $table->unsignedBigInteger('localidade_id'); // ← Nombre correcto
            
            $table->foreign('localidade_id') // ← Coincide con el nombre de la columna
                  ->references('id')
                  ->on('localidades')
                  ->onDelete('cascade');
            
            $table->boolean('retira_local')->default(false);
            $table->timestamps();
            
            $table->foreign('cliente_id')
                  ->references('codigoCli')
                  ->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sucursales');
    }
};
