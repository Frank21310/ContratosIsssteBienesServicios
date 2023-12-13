<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonaFisica extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_persona_fisica';
    protected $table = 'persona_fisica';
    protected $fillable = [
        'contrato_id',
        'tipo_persona_id',
        'rfc',
        'nombre_proveedor',
        'nacionalidad',
        'domicilio',
        'documento_expedicion',
        'instutucion_expedida',
    ];
    public function Contratos(): BelongsTo
    {
        return $this->belongsTo(Contrato::class, 'contrato_id', 'id_contrato');
    }
    public function Tipos(): BelongsTo
    {
        return $this->belongsTo(TipoPersona::class, 'tipo_persona_id', 'id_tipo_persona');
    }
}
