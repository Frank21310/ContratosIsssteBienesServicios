<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_partida';
    protected $table = 'partidas';
    protected $fillable = [
        'capitulo_id',
        'descripcion',
    ];
}
