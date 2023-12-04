<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleRequisicion extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'detallerequisiciones';
    protected $fillable = [
        'requisicion_id',
        'num_partida',
        'cucop',
        'descripcion',
        'cantidad',
        'medida_id',
        'precio',
        'importe',
    ];
    
    public function Requisiciones()
    {
        return $this->belongsTo(Requisicion::class, 'requisicion_id');
    }
    public function Partidas()
    {
        return $this->belongsTo(Partida::class, 'num_partida');
    }
    
    public function Insumos()
    {
        return $this->belongsTo(Insumo::class, 'cucop');
    }
    public function Medidas()
    {
        return $this->belongsTo(Medida::class, 'medida_id');
    }
}

