<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ceremonias extends Model
{
    protected $table = 'ceremonias';
    protected $primaryKey = 'idCeremonias';

    public function parroquia()
    {
        return $this->belongsTo(Parroquias::class, 'fkParroquias', 'idParroquias');
    }
    public function sacerdote()
    {
        return $this->belongsTo(Sacerdotes::class, 'fkSacerdotes', 'idSacerdotes');
    }
}
