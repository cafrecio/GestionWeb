<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes'; // Nombre real de la tabla
    protected $primaryKey = 'codigoCli'; // Clave primaria personalizada
    public $incrementing = false; // La clave no es autoincremental
    protected $keyType = 'string'; // Tipo de clave primaria

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'codigoCli',
        'cuitCli',
        'fechaAltaCli',
        'fechaUltimaFacCli',
        'descr_Mda',
        'razonSocialBusCli',
        'razonSocialCli',
        'estadoCli',
        'nombreVendedor',
        'codigListaPrec',
        'descrListaPrec',
        'codigCondiPago',
        'descrCondiPago',
        'entregamos'
    ];

    // Relación con sucursales
    public function sucursales()
    {
        return $this->hasMany(Sucursale::class, 'cliente_id', 'codigoCli');
    }

    // Relación con contactos
    public function contactos()
    {
        return $this->hasMany(Contacto::class, 'cliente_id', 'codigoCli');
    }
}