<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Configuracion\ProvinciaIndex;

Route::get('/', function () {
    return view('dashboard'); // ⚠️ Cambiamos para no forzar provincias
});


