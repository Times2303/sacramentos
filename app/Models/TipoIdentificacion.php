<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoIdentificacion extends Model
{
    protected $table = 'tipoidentificacion';
    protected $primaryKey = 'idTipoIdentificacion'; // 🔑 Aquí le dices cuál es el ID real
    public $timestamps = false; // Si no usas created_at y updated_at
}
