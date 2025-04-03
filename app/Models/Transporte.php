<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    protected $table = 'transportes';

    protected $fillable = ['razon_social'];

    // Relación con sucursales de transporte
    public function sucursalesTransporte()
    {
        return $this->hasMany(SucursalTransporte::class);
    }
}