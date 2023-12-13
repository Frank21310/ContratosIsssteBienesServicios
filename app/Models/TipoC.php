<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoC extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tipo_contrato';
    protected $table = 'tipocontrato';
    protected $fillable = [
        'nombre_tipo_contrato',
    ];
}
