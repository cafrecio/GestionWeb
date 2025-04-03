<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciaController;
use Illuminate\Support\Facades\Auth;


// Grupo de rutas para "Configuración General"
Route::prefix('configuracion-general')->middleware(['auth'])->group(function () {
    // Rutas de provincias
    Route::resource('provincias', ProvinciaController::class);

    // Control de perfiles (comentado por ahora)
    // Route::middleware(['role:admin'])->group(function () {
    //     Route::resource('provincias', ProvinciaController::class);
    // });
});

// Ruta de inicio (puedes personalizarla según tu necesidad)
Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
