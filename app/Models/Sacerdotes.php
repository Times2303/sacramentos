<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sacerdotes extends Model
{
    protected $table = 'sacerdotes';
    protected $primaryKey = 'idSacerdotes';

    // Relaciones con otras tablas
    public function persona()
    {
        return $this->belongsTo(Personas::class, 'fkPersonas', 'idPersonas');
    }
    public function jerarquia()
    {
        return $this->belongsTo(Jerarquias::class, 'fkJerarquias', 'idJerarquias');
    }
    public function parroquia()
    {
        return $this->belongsTo(Parroquias::class, 'fkParroquias', 'idParroquias');
    }
    
}
