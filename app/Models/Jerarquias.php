<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jerarquias extends Model
{
    protected $table = 'jerarquias';
    protected $primaryKey = 'idJerarquias';

    public function sacerdotes()
    {
        return $this->hasMany(Sacerdotes::class, 'fkJerarquia', 'idJerarquias');
    }
}
