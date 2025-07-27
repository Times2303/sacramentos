<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Personas extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'idPersonas';

    // BelongsTo -> “Este modelo pertenece a otro” (va en el que tiene la FK).
    // hasMany -> “Este modelo tiene muchos de otro” (va en el que no tiene la FK).
    // Enlace con tabla TipoIdentificacion
    public function tipoidentificacion()
    {
        return $this->belongsTo(TipoIdentificacion::class, 'fkTipoIdentificacion', 'idTipoIdentificacion');
    }

    // Enlace con tabla Sacerdotes a la inversa
    public function sacerdotes()
{
    return $this->hasMany(Sacerdotes::class, 'fkPersonas', 'idPersonas');
}
}
