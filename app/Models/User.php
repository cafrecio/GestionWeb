<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // ✅ Campos que se pueden asignar masivamente (ej: create o update)
    protected $fillable = [
        'nombre',
        'apellido',
        'nick',
        'mail',
        'iniciales',
        'name',
        'email',
        'password',
        'perfil',
    ];

    // ✅ Ocultar campos sensibles al convertir en array o JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ✅ Casts automáticos (ej: timestamps)
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ✅ Podés agregar métodos personalizados si querés, por ejemplo:
    public function getNombreCompletoAttribute()
    {
        return "{$this->nombre} {$this->apellido}";
    }
}

