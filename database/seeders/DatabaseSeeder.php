<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Llama a tu seeder personalizado para usuarios iniciales
        $this->call(UsuarioInicialSeeder::class);
    }
}

