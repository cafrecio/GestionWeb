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
        Schema::create('clientes', function (Blueprint $table) {
            $table->string('codigoCli')->primary();
            $table->string('cuitCli');
            $table->date('fechaAltaCli');
            $table->date('fechaUltimaFacCli')->nullable();
            $table->string('razonSocialBusCli');
            $table->string('razonSocialCli');
            $table->string('estadoCli');
            $table->string('nombreVendedor');
            $table->boolean('entregamos')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
