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
        Schema::create('persona_moral', function (Blueprint $table) {
            $table->id('id_persona_moral');
            $table->foreignId('contrato_id')
                ->references('id_contrato')
                ->on('contrato');
            $table->foreignId('tipo_persona_id')
                ->references('id_tipo_persona')
                ->on('tipopersona');
            $table->string('rfc');
            $table->string('nombre_proveedor');
            $table->string('nacionalidad');
            $table->string('domicilio');
            $table->string('instrumento_publico');
            $table->string('registro_publico');
            $table->string('fiolio_registro');
            $table->string('fecha_registro');
            $table->string('repesentante_nombre');
            $table->foreignId('tipo_caracter_id')
            ->references('id_tipo_caracter')
            ->on('tipocaracter');
            $table->string('instrumento_notarial');
            $table->string('instrumento_publico_representante');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona_moral');
    }
};
