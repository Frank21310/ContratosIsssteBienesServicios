<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contrato extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_contrato';
    protected $table = 'contratos';
    protected $fillable = [
        'requisicion_id',
        'tipo_contrato_id',
        'descripcion_contrato',
        'vigencia_contrato',
        'empleado_num', 
        'oficio_suficiencia',
        'fecha_oficio_suficiencia',
        'oficio_plurianualidad',
        'reduccion',
        'autorizacion_previa',
        'proveedor'
    ];
    public function Requisiciones(): BelongsTo
    {
        return $this->belongsTo(Requisicion::class, 'requisicion_id', 'id_requisicion');
    }
    public function TipoContratos(): BelongsTo
    {
        return $this->belongsTo(TipoC::class, 'tipo_contrato_id', 'id_tipo_contrato');
    }
    public function AdminContratos(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'empleado_num', 'num_empleado');
    }
    public function Proveedor(): BelongsTo
    {
        return $this->belongsTo(Proveedor::class, 'proveedor', 'id_proveedor');
    }
    
}
