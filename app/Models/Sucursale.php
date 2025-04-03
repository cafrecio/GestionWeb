<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sucursale extends Model
{
    protected $table = 'sucursales'; // Nombre real de la tabla

    protected $fillable = [
        'cliente_id',
        'nombre',
        'direccion',
        'localidade_id',
        'retira_local'
    ];

    // Relación con cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'codigoCli');
    }

    // Relación con localidad
    public function localidade()
    {
        return $this->belongsTo(Localidade::class, 'localidade_id');
    }
}