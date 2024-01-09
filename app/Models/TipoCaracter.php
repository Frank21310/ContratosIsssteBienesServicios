<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCaracter extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_caracter';
    protected $table = 'tipocaracter';
    protected $fillable = [
        'nombre_caracter',
    ];
}
