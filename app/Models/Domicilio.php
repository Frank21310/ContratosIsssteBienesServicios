<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Domicilio extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_domicilio';
    protected $table = 'domicilios';
    protected $fillable = [
        'calle',
        'municipio',
        'codigo_postal',
        'estado',
        'pais',
    ];

}
