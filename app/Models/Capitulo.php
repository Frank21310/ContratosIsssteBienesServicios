<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_capitulo';
    protected $table = 'capitulos';
    protected $fillable = [
        'nombre_capitulo',
    ];
}
