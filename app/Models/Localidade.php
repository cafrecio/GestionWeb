<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    protected $table = 'localidades'; // Nombre real de la tabla

    protected $fillable = [
        'provincia_id',
        'zona_id',
        'nombre',
        'codigo_postal'
    ];

    // Relación con provincia
    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    // Relación con zona
    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
}
