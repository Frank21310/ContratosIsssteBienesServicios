<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_medida';
    protected $table = 'medida';
    protected $fillable = [
        'nombre_medida',
    ];
}
