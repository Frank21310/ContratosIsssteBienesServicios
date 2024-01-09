<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Proveedor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_proveedor';
    protected $table = 'proveedores';
    protected $fillable = [
        'persona_id',
        'nombre',
        'rfc',
        'nacionlidad',
        'domicilio_id',
        'documento_expedicion',
        'institucion_expedida',
        'instrumento_publico',
        'registro_publico',
        'folio_registro',
        'fecha_registro',
        'representante',
        'caracter_id',
        'instrumento_notarial_represntante'
    ];
    public function Personas(): HasOne
    {
        return $this->hasOne(Persona::class, 'id_persona', 'persona_id');
    }
    public function Domicilios(): HasOne
    {
        return $this->hasOne(Domicilio::class, 'id_domicilio', 'domicilio_id');
    }
    public function Caracter(): HasOne
    {
        return $this->hasOne(TipoCaracter::class, 'id_caracter', 'caracter_id');
    }
}
