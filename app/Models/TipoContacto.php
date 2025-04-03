<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoContacto extends Model
{
    protected $table = 'tipo_contactos';

    protected $fillable = ['descripcion'];

    // Relación con contactos
    public function contactos()
    {
        return $this->hasMany(Contacto::class);
    }
}