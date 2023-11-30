<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Insumo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_cucop';
    protected $table = 'insumos';
    protected $fillable = [
        'clave_cucop',
        'partida_id',
        'descripcion',
        'CABM',
        'tipo_contratacion',
    ];
    public function PartidaInsumo(): HasOne
    {
        return $this->hasOne(Partida::class, 'id_partida_especifica','partida_id' );
    }
}
