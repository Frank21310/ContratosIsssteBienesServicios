<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contrato extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_contrato';
    protected $table = 'contrato';
    protected $fillable = [
        'requisicion_id',
        'tipo_contrato_id',
        'vigencia_contrato',
        'oficio_suficiencia',
        'fecha_oficio_suficiencia',
        'oficio_plurianualidad',
        'reduccion',
        'autorizacion_previa',
    ];
    public function Requisiciones(): BelongsTo
    {
        return $this->belongsTo(Requisicion::class, 'requisicion_id', 'id_requisicion');
    }
    public function TipoContratos(): BelongsTo
    {
        return $this->belongsTo(TipoPersona::class, 'tipo_contrato_id', 'id_tipo_contrato');
    }
}
