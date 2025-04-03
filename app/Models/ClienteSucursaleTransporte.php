<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteSucursaleTransporte extends Model
{
    protected $table = 'cliente_sucursale_transportes';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'cliente_id',
        'sucursal_id',
        'sucursal_transporte_id',
        'activo'
    ];

    // Relación con el cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'codigoCli');
    }

    // Relación con la sucursal del cliente
    public function sucursale()
    {
        return $this->belongsTo(Sucursale::class, 'sucursal_id');
    }

    // Relación con la sucursal del transporte
    public function sucursalTransporte()
    {
        return $this->belongsTo(SucursalTransporte::class, 'sucursal_transporte_id');
    }
}