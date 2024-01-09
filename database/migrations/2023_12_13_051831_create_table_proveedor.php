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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->bigIncrements('id_proveedor');
            $table->foreignId('persona_id')
                ->references('id_persona')
                ->on('personas');
            $table->string('nombre');
            $table->string('rfc');
            $table->string('nacionlidad');
            $table->foreignId('domicilio_id')
                ->references('id_domicilio')
                ->on('domicilios');
            $table->string('documento_expedicion');
            $table->string('institucion_expedida');
            $table->string('instrumento_publico');
            $table->string('registro_publico');
            $table->string('folio_registro');
            $table->string('fecha_registro');
            $table->string('representante');
            $table->foreignId('caracter_id')
                ->references('id_caracter')
                ->on('tipocaracter');
            $table->string('instrumento_notarial_represntante');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
