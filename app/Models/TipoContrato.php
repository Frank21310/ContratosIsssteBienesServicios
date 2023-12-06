<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tipo';
    protected $table = 'tipocontratacion';
    protected $fillable = [
        'nombre_tipo',
    ];

}
