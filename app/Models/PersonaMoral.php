<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonaMoral extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_persona_moral';
    protected $table = 'persona_moral';
    protected $fillable = [
        'contrato_id',
        'tipo_persona_id',
        'rfc',
        'nombre_proveedor',
        'nacionalidad',
        'domicilio',
        'instrumento_publico',
        'registro_publico',
        'fiolio_registro',
        'fecha_registro',
        'repesentante_nombre',
        'tipo_caracter_id',
        'instrumento_notarial',
        'instrumento_publico_representante',

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
