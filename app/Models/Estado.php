<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_estatus';
    protected $table = 'estatus';
    protected $fillable = [
        'nombre_estatus',
    ];
}
