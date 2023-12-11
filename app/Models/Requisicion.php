<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Requisicion extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_requisicion';
    protected $table = 'requisiciones';
    protected $fillable = [
        'dependencia_id',
        'area_id',
        'fecha_elaboracion',
        'no_requisicion',
        'fecha_requerida',
        'lugar_entrega',
        'otros_gravamientos',
        'total',
        'anexos',
        'aticipos',
        'autorizacion_presupuesto',
        'existencia_almacen',
        'observaciones',
        'registro_sanitario',
        'normas',
        'capacitacion',
        'pais_id',
        'metodo_id',
        'garantia1_id',
        'porcentaje_1',
        'garantia_2_id',
        'porcentaje_2',
        'garantia_3_id',
        'porcentaje_3',
        'pluralidad',
        'penas_convencionales',
        'tiempo_fabricacion',
        'condicion_id',
        'solicita',
        'autoriza',
        'estatus',
        'tipo_id',
    ];
    public function Detalles()
    {
        return $this->hasMany(DetalleRequisicion::class, 'requisicion_id');
    }
    public function Paises(): HasOne
    {
        return $this->hasOne(Pais::class, 'id_pais', 'pais_id');
    }

    public function Dependencias(): HasOne
    {
        return $this->hasOne(Dependencia::class, 'id_dependencia', 'dependencia_id');
    }
    public function Areas(): HasOne
    {
        return $this->hasOne(Area::class, 'id_area', 'area_id');
    }
    public function Metodos(): HasOne
    {
        return $this->hasOne(Metodo::class, 'id_metodo', 'metodo_id');
    }
    public function Garantias(): HasOne
    {
        return $this->hasOne(Garantia::class, 'id_garantia', 'garantia1_id');
    }
    public function Condiciones(): HasOne
    {
        return $this->hasOne(Condicion::class, 'id_condicion', 'condicion_id');
    }
    public function Estatus(): HasOne
    {
        return $this->hasOne(Estado::class, 'id_estatus', 'estatus');
    }
    public function Tipos(): HasOne
    {
        return $this->hasOne(TipoContrato::class, 'id_tipo', 'tipo_id');
    }
}
