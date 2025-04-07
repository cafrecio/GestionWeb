<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinciaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard (requiere login y verificación)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas que requieren login
Route::middleware('auth')->group(function () {

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 🔐 CONFIGURACIÓN GENERAL
    Route::prefix('configuracion')->group(function () {

        // Provincias
        Route::resource('provincias', ProvinciaController::class)
            ->names('configuracion.provincias');
        
        // Redirección a dashboard
        Route::get('/home', function () {
            return redirect()->route('dashboard');
        })->name('home');
    
        // ✅ TEST: Ruta independiente
        Route::get('/test', function () {
            return view('test');
        });
    });
});

require __DIR__.'/auth.php';
