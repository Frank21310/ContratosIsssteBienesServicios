<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_proveedor';
    protected $table = 'proveedores';
    protected $fillable = [
        'id_proveedor',
        'nombre_proveedor',
        'rfc',
        'pais',
        'entidad_federativa',
        'estratificacion',
        'tipo_usuario',
        'sector',
        'giro',
        'grado_cumplimiento'
    ];

}
