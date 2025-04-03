<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincias';

    protected $fillable = ['nombre'];

    // Relación con localidades
    public function localidades()
    {
        return $this->hasMany(Localidade::class);
    }
}