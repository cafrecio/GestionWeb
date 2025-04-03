<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contactos';

    protected $fillable = [
        'cliente_id',
        'tipo_contacto_id',
        'nombre',
        'apellido',
        'telefono',
        'celular',
        'mail'
    ];

    // Relación con cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'codigoCli');
    }

    // Relación con tipo de contacto
    public function tipoContacto()
    {
        return $this->belongsTo(TipoContacto::class);
    }
}
