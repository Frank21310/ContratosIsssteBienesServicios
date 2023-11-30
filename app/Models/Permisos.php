<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Permisos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_permiso';
    protected $table = 'permisos';
    protected $fillable = [
        'nombre_permiso',
    ];
}