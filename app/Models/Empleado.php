<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Empleado extends Model
{
    use HasFactory;
    protected $primaryKey = 'num_empleado';
    protected $table = 'empleados';
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'cargo_id',
        'dependencia_id_dependencia',
    ];
    public function Permisos(): BelongsTo
    {
        return $this->belongsTo(Permisos::class, 'permiso_id_permisos', 'id_permisos');
    }
    public function Cargos()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id_cargo');
    }

    public function Dependencias()
    {
        return $this->belongsTo(Dependencia::class, 'dependencia_id', 'id_dependencia');
    }
}

