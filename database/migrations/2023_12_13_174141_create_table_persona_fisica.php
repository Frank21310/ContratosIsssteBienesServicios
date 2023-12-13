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
        Schema::create('persona_fisica', function (Blueprint $table) {
            $table->id('id_persona_fisica');
            $table->foreignId('contrato_id')
                ->references('id_contrato')
                ->on('contrato');
            $table->foreignId('tipo_persona_id')
                ->references('id_tipo_persona')
                ->on('tipopersona');
            $table->timestamps();
            $table->string('rfc');
            $table->string('nombre_proveedor');
            $table->string('nacionalidad');
            $table->string('domicilio');
            $table->string('documento_expedicion');
            $table->string('instutucion_expedida');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona_fisica');
    }
};
