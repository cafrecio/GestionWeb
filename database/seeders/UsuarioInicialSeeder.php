<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuarioInicialSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nombre' => 'Carlos Alfredo',
                'apellido' => 'Bonifacio',
                'nick' => 'cbonifacio',
                'iniciales' => 'CB',
                'name' => 'Carlos Alfredo Bonifacio',
                'email' => 'ventas@cyeingenieria.com.ar',
                'password' => Hash::make('12345678'),
                'perfil' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Laura',
                'apellido' => 'Ferreira',
                'nick' => 'lferreira',
                'iniciales' => 'LF',
                'name' => 'Laura Ferrerira',
                'email' => 'ventas1@cyeingenieria.com.ar',
                'password' => Hash::make('12345678'),
                'perfil' => 'vendedor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
