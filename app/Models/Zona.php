<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = 'zonas';

    protected $fillable = [
        'codigo',
        'nombre',
        'entrega_directa'
    ];

    // Relación con localidades
    public function localidades()
    {
        return $this->hasMany(Localidade::class);
    }
}