<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requisiciones', function (Blueprint $table) {
            $table->bigIncrements('id_requisicion');
            $table->foreignId('dependencia_id')
            ->references('id_dependencia')
            ->on('dependencias');
            $table->foreignId('area_id')
            ->references('id_area')
            ->on('areas');
            $table->date('fecha_elaboracion');
            $table->bigInteger('no_requisicion');
            $table->date('fecha_requerida');
            $table->string('lugar_entrega');
            $table->float('otros_gravamientos');
            $table->float('total');
            $table->string('anexos');
            $table->string('aticipos');
            $table->string('autorizacion_presupuesto');
            $table->boolean('existencia_almacen');
            $table->string('observaciones');
            $table->string('registro_sanitario');
            $table->string('normas');
            $table->boolean('capacitacion');
            $table->foreignId('pais_id')
            ->references('id_pais')
            ->on('paises');
            $table->foreignId('metodo_id')
            ->references('id_metodo')
            ->on('metodos');
            $table->foreignId('garantia1_id')
            ->references('id_garantia')
            ->on('garantias');
            $table->string('porcentaje_1');
            $table->foreignId('garantia_2_id')
            ->references('id_garantia')
            ->on('garantias');
            $table->string('porcentaje_2');
            $table->foreignId('garantia_3_id')
            ->references('id_garantia')
            ->on('garantias');
            $table->string('porcentaje_3');
            $table->boolean('pluralidad');
            $table->boolean('penas_convencionales');
            $table->string('tiempo_fabricacion');
            $table->foreignId('condicion_id')
            ->references('id_condicion')
            ->on('condiciones');
            $table->foreignId('solicita')
            ->references('num_empleado')
            ->on('empleados');
            $table->string('autoriza');
            $table->foreignId('estatus')
            ->references('id_estatus')
            ->on('estatus');
            $table->foreignId('tipo_id')
            ->references('id_tipo')
            ->on('tipocontratacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisiciones');
    }
};
