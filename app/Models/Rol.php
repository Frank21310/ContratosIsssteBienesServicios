<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rol extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_rol';
    protected $table = 'roles';
    protected $fillable = [
        'nombre_rol',
        'permiso_id',

    ];
    public function Permisos(): BelongsTo
    {
        return $this->belongsTo(Permisos::class, 'permiso_id', 'id_permisos');
    }
}