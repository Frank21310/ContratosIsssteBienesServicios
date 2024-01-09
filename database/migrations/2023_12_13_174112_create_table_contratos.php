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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id('id_contrato');
            $table->foreignId('requisicion_id')
                ->references('id_requisicion')
                ->on('requisiciones');
            $table->foreignId('tipo_contrato_id')
                ->references('id_tipo_contrato')
                ->on('tipocontrato');
            $table->string('descripcion_contrato');
            $table->string('vigencia_contrato');
            $table->foreignId('empleado_num')
                ->references('num_empleado')
                ->on('empleados');
            $table->string('oficio_suficiencia');
            $table->string('fecha_oficio_suficiencia');
            $table->string('oficio_plurianualidad');
            $table->string('reduccion');
            $table->string('autorizacion_previa');
            $table->foreignId('proveedor')
                ->references('id_proveedor')
                ->on('proveedores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
