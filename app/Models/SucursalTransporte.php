<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SucursalTransporte extends Model
{
    protected $table = 'sucursal_transportes';

    protected $fillable = [
        'transporte_id',
        'nombre',
        'direccion',
        'localidade_id',
        'telefono',
        'email'
    ];

    // Relación con transporte
    public function transporte()
    {
        return $this->belongsTo(Transporte::class);
    }

    // Relación con localidad
    public function localidade()
    {
        return $this->belongsTo(Localidade::class);
    }
}