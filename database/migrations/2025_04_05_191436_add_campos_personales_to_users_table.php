<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nombre')->after('id');
            $table->string('apellido')->after('nombre');
            $table->string('nick')->unique()->after('apellido');
            $table->string('mail')->unique()->after('nick');
            $table->string('iniciales', 10)->after('mail');
            $table->string('perfil')->after('password');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nombre', 'apellido', 'nick', 'mail', 'iniciales', 'perfil']);
        });
    }
};
