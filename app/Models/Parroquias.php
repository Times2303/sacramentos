<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parroquias extends Model
{
    protected $table = 'parroquias';
    protected $primaryKey = 'idParroquias';

    public function sacerdotes()
    {
        return $this->hasMany(Sacerdotes::class, 'fkParroquias', 'idParroquias');
    }
}
