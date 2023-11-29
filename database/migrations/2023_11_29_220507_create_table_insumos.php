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
        Schema::create('insumos', function (Blueprint $table) {
            $table->id('id_cucop');
            $table->bigInteger('clave_cucop');
            $table->foreignId('partida_id')
            ->references('id_partida')
            ->on('partidas'); 
            $table->string('descripcion');
            $table->string('CABM');
            $table->string('tipo_contratacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insumos');
    }
};
